<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:partners,email',
            'company_name' => 'required|string|max:255',
            'reason' => 'required|string',
            'phone' => 'required|string|max:20',
            'website' => 'required|url'
        ]);

        Partner::create($validated);

        return redirect()->back()->with('success', 'Thank you! Your partnership request has been submitted.');
    }
}
