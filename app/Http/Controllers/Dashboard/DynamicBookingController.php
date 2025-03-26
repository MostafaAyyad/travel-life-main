<?php
namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DynamicBookingSection;
use App\Models\DynamicBookingField;

class DynamicBookingController extends Controller
{
    public function index() {
        $sections = DynamicBookingSection::with('fields')->get();
        return view('dashboard.dynamic-booking.index', compact('sections'));
    }

    public function create() {
        return view('dashboard.dynamic-booking.create-section');
    }

    public function storeSection(Request $request) {
        $request->validate(['title' => 'required|string']);
        $section = DynamicBookingSection::create(['title' => $request->title]);
        return redirect()->route('dashboard.dynamic-booking.create-fields', $section->id);
    }

    public function createFields($sectionId) {
        $section = DynamicBookingSection::findOrFail($sectionId);
        return view('dashboard.dynamic-booking.create-fields', compact('section'));
    }

    public function storeFields(Request $request, $sectionId) {
        foreach ($request->fields as $field) {
            DynamicBookingField::create([
                'section_id' => $sectionId,
                'label' => $field['label'],
                'type' => $field['type'],
                'placeholder' => $field['placeholder'],
                'default_value' => $field['default_value'] ?? '',
                'required' => isset($field['required']) ? (bool)$field['required'] : false,
            ]);
        }
        return redirect()->route('dashboard.dynamic-booking.index')->with('success', 'Fields added successfully.');
    }

    public function destroy(DynamicBookingSection $section) {
        $section->delete();
        return back()->with('success', 'Section deleted.');
    }

    public function showSection($sectionId) {
        $section = DynamicBookingSection::with('fields')->findOrFail($sectionId);
        return view('dashboard.dynamic-booking.show-section', compact('section'));
    }
}
