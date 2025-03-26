<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\CarRentalOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardCarRentalOfferController extends Controller
{
    public function index()
    {
        $cars = CarRentalOffer::latest()->get();
        return view('dashboard.pages.car-rental.index', compact('cars'));
    }

    public function create()
    {
        return view('dashboard.pages.car-rental.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imagePath = $request->file('image')->store('uploads/car-rental', 'public');

        CarRentalOffer::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard.car-rental.index')->with('success', 'Car rental offer created successfully!');
    }

    public function edit($id)
    {
        $carRentalOffer = CarRentalOffer::findOrFail($id);
        return view('dashboard.pages.car-rental.edit', compact('carRentalOffer'));
    }

    public function update(Request $request, $id)
    {
        $offer = CarRentalOffer::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($offer->image)) {
                Storage::disk('public')->delete($offer->image);
            }
            $imagePath = $request->file('image')->store('uploads/car-rental', 'public');
            $offer->image = $imagePath;
        }

        $offer->title = $validated['title'];
        $offer->description = $validated['description'];
        $offer->save();

        return redirect()->route('dashboard.car-rental.index')->with('success', 'Car rental offer updated successfully!');
    }

    public function destroy($id)
    {
        $offer = CarRentalOffer::findOrFail($id);

        if (Storage::disk('public')->exists($offer->image)) {
            Storage::disk('public')->delete($offer->image);
        }

        $offer->delete();

        return redirect()->route('dashboard.car-rental.index')->with('success', 'Car rental offer deleted successfully!');
    }
}
