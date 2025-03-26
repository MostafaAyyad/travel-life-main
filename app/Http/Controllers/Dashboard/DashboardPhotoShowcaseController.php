<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PhotoShowcase;
use Illuminate\Support\Facades\Storage;

class DashboardPhotoShowcaseController extends Controller
{
    public function index()
    {
        $photos = PhotoShowcase::latest()->get();
        return view('dashboard.pages.photo-showcase.index', compact('photos'));
    }

    public function create()
    {
        return view('dashboard.pages.photo-showcase.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('image')->store('photo-showcase', 'public');

        PhotoShowcase::create([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'image' => $imagePath,
        ]);

        return redirect()->route('dashboard.photo-showcases.index')->with('success', 'Photo added successfully!');
    }

    public function edit($id)
    {
        $photo = PhotoShowcase::findOrFail($id);
        return view('dashboard.pages.photo-showcase.edit', compact('photo'));
    }

    public function update(Request $request, $id)
    {
        $photo = PhotoShowcase::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:500',
            'image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('image')) {
            if ($photo->image && Storage::disk('public')->exists($photo->image)) {
                Storage::disk('public')->delete($photo->image);
            }
            $imagePath = $request->file('image')->store('photo-showcase', 'public');
            $photo->image = $imagePath;
        }

        $photo->title = $validated['title'];
        $photo->description = $validated['description'];
        $photo->save();

        return redirect()->route('dashboard.photo-showcases.index')->with('success', 'Photo updated successfully!');
    }

    public function destroy($id)
    {
        $photo = PhotoShowcase::findOrFail($id);
        if ($photo->image && Storage::disk('public')->exists($photo->image)) {
            Storage::disk('public')->delete($photo->image);
        }
        $photo->delete();

        return redirect()->route('dashboard.photo-showcases.index')->with('success', 'Photo deleted successfully!');
    }
}
