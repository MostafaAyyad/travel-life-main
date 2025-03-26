<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardFeedbackController extends Controller
{
    public function index()
    {
        $feedbacks = Feedback::latest()->get();
        return view('dashboard.pages.feedback.index', compact('feedbacks'));
    }

    public function create()
    {
        return view('dashboard.pages.feedback.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('uploads/feedback', 'public');
        }

        Feedback::create($validated);
        return redirect()->route('dashboard.feedback.index')->with('success', 'Feedback added successfully!');
    }

    public function edit($id)
    {
        $feedback = Feedback::findOrFail($id);
        return view('dashboard.pages.feedback.edit', compact('feedback'));
    }

    public function update(Request $request, $id)
    {
        $feedback = Feedback::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'comment' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp',
        ]);

        if ($request->hasFile('image')) {
            if ($feedback->image) {
                Storage::disk('public')->delete($feedback->image);
            }
            $validated['image'] = $request->file('image')->store('uploads/feedback', 'public');
        }

        $feedback->update($validated);
        return redirect()->route('dashboard.feedback.index')->with('success', 'Feedback updated successfully!');
    }

    public function destroy($id)
    {
        $feedback = Feedback::findOrFail($id);
        if ($feedback->image) {
            Storage::disk('public')->delete($feedback->image);
        }
        $feedback->delete();
        return redirect()->route('dashboard.feedback.index')->with('success', 'Feedback deleted successfully!');
    }
}
