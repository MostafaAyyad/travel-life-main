<?php

namespace App\Services;

use Stripe\Stripe;
use Stripe\Charge;
use Exception;

class PaymentService
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function charge($amount, $currency, $token)
    {
        try {
            return Charge::create([
                'amount' => $amount * 100, // Stripe يأخذ المبلغ بالسنت
                'currency' => $currency,
                'source' => $token,
                'description' => 'Car Rental Payment',
            ]);
        } catch (Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }
}
