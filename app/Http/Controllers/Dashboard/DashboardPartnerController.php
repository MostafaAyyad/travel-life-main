<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;

class DashboardPartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::latest()->get();
        return view('dashboard.pages.partners.index', compact('partners'));
    }

    public function create()
    {
        return view('dashboard.pages.partners.create');
    }

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

        return redirect()->route('dashboard.partners.index')->with('success', 'Partner created successfully.');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        $partner->delete();

        return redirect()->back()->with('success', 'Partner deleted successfully.');
    }
}
