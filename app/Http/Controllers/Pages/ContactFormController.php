<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactForm;
use App\Helpers\EmailVerificationHelper;

class ContactFormController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'form_name' => 'required|string|max:255',
            'form_email' => 'required|email|max:255',
            'form_subject' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:30',
            'form_message' => 'required|string',
        ]);
        $result = EmailVerificationHelper::verify($request->email);
        if ($result !== true) {
            return back()->withErrors(['form_email' => $result]);
        }

        ContactForm::create([
            'form_name' => $request->form_name,
            'form_email' => $request->form_email,
            'form_subject' => $request->form_subject,
            'phone_number' => $request->input('phone-number'),
            'form_message' => $request->form_message,
        ]);

        return redirect()->back()->with('success', 'Your message has been sent successfully!');
    }
}
