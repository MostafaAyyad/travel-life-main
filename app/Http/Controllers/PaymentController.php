<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    protected $paymentService;

    public function __construct(PaymentService $paymentService)
    {
        $this->paymentService = $paymentService;
    }

    public function showForm()
    {
        return view('payment.form');
    }

    public function makePayment(Request $request)
    {
        $request->validate([
            'car_type' => 'required|string',
            'date_of_receipt' => 'required|date',
            'pick_up_time' => 'required',
            'number_of_days' => 'required|integer',
            'receiving_location' => 'required|string',
            'total_price' => 'required|numeric',
            'payment_method' => 'required|string',
        ]);

        $paymentMethod = $request->payment_method;
        $order = Order::create($request->all());

        if ($paymentMethod == 'credit_card') {
            try {
                $this->paymentService->charge(
                    $request->total_price,
                    'usd',
                    $request->token
                );
                $order->update(['payment_status' => 'completed']);
                return back()->with('success', 'تم الدفع بنجاح!');
            } catch (\Exception $e) {
                return back()->with('error', $e->getMessage());
            }
        }elseif ($paymentMethod == 'paypal') {
            $provider = new \Srmklive\PayPal\Services\PayPal();
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();

            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "purchase_units" => [
                    [
                        "amount" => [
                            "currency_code" => "USD",
                            "value" => $request->total_price
                        ]
                    ]
                ],
                "application_context" => [
                    "return_url" => route('paypal.success'),
                    "cancel_url" => route('paypal.cancel'),
                ]
            ]);

            if (isset($response['id']) && $response['status'] == 'CREATED') {
                foreach ($response['links'] as $link) {
                    if ($link['rel'] === 'approve') {
                        return redirect()->away($link['href']);
                    }
                }
            }

            return back()->with('error', 'فشل في إنشاء طلب الدفع عبر PayPal.');
        } elseif ($paymentMethod == 'cash') {
            $order->update(['payment_status' => 'pending']);
            return back()->with('success', 'تم تأكيد الطلب، الدفع عند الاستلام.');
        }

        return back()->with('error', 'حدث خطأ أثناء معالجة الدفع.');
    }
    public function capturePaypalPayment(Request $request)
    {
        $provider = new \Srmklive\PayPal\Services\PayPal();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        if ($request->has('token')) {
            $response = $provider->capturePaymentOrder($request->token);
            if ($response['status'] == 'COMPLETED') {
                // إذا كنت تحفظ الطلبات مسبقًا يمكنك تحديث الطلب بحالة الدفع المكتملة هنا
                return redirect()->route('payment.form')->with('success', 'تم الدفع بنجاح عبر PayPal!');
            } else {
                return redirect()->route('payment.form')->with('error', 'فشل تأكيد الدفع عبر PayPal.');
            }
        }

        return redirect()->route('payment.form')->with('error', 'لم يتم العثور على معرف الدفع.');
    }

}
