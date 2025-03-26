<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\TravelDeal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardTravelDealController extends Controller
{
    public function index() {
        $travelDeals = TravelDeal::latest()->get();
        return view('dashboard.pages.travel_deals.index', compact('travelDeals'));
    }

    public function create() {
        return view('dashboard.pages.travel_deals.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        // $imagePath = $request->file('image')->store('travel_deals', 'public');
        $imagePath = null;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('travel_deals', 'public');
        }
        TravelDeal::create(array_merge($validated, ['image' => $imagePath]));

        return redirect()->route('dashboard.travel_deals.index')->with('success', 'Travel deal created successfully.');
    }
    public function edit($id)
    {
        $deal = TravelDeal::findOrFail($id);
        return view('dashboard.pages.travel_deals.edit', compact('deal'));
    }
    public function update(Request $request, $id)
    {
        $deal = TravelDeal::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // حذف الصورة القديمة إذا كانت موجودة
            if ($deal->image && file_exists(storage_path('app/public/' . $deal->image))) {
                unlink(storage_path('app/public/' . $deal->image));
            }

            $imagePath = $request->file('image')->store('travel-deals', 'public');
            $deal->image = $imagePath;
        }

        $deal->title = $validated['title'];
        $deal->description = $validated['description'];
        $deal->price = $validated['price'];
        $deal->save();

        return redirect()->route('dashboard.travel_deals.index')->with('success', 'Travel deal updated successfully.');
    }
    public function destroy($id) {
        $deal = TravelDeal::findOrFail($id);
        Storage::disk('public')->delete($deal->image);
        $deal->delete();

        return redirect()->route('dashboard.travel_deals.index')->with('success', 'Travel deal deleted successfully.');
    }
}
