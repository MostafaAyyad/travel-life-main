<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DynamicBookingEntry;
use App\Models\DynamicBookingSection;

class DynamicBookingEntryController extends Controller
{
    public function showEntries()
    {
        $sections = DynamicBookingSection::with(['fields', 'entries'])->get();

        return view('dashboard.dynamic-booking.show-entries', compact('sections'));
    }

    public function store(Request $request, $sectionId)
    {
        $section = DynamicBookingSection::findOrFail($sectionId);

        $validatedData = $request->validate([
            'fields' => 'required|array',
        ]);

        DynamicBookingEntry::create([
            'section_id' => $sectionId,
            'form_data' => $validatedData['fields'],
        ]);

        return redirect()->back()->with('success', 'Your booking has been submitted successfully!');
    }

}
