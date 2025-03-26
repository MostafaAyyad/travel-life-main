<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use App\Models\Subscription;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function index()
    {
        $subscriptions = Subscription::latest()->get();
        return view('dashboard.pages.subscriptions.index', compact('subscriptions'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscriptions,email',
        ]);

        Subscription::create([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Thank you for subscribing!');
    }
    public function destroy($id)
    {
        Subscription::destroy($id);
        return redirect()->back()->with('success', 'Subscription deleted successfully.');
    }
}
