<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Helpers\EmailVerificationHelper;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        $result = EmailVerificationHelper::verify($request->email);
        if ($result !== true) {
            return back()->withErrors(['email' => $result]);
        }

        Contact::create($validated);

        return redirect()->back()->with('successContact', 'Your message has been sent successfully!');
    }
}
