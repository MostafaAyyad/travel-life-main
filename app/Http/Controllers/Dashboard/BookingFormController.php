<?php
namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Models\BookingForm;
use Illuminate\Http\Request;

class BookingFormController extends Controller
{
    public function index() {
        $forms = BookingForm::all();
        return view('dashboard.pages.booking-forms.index', compact('forms'));
    }

    public function create() {
        return view('dashboard.pages.booking-forms.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'title' => 'required|string',
            'fields' => 'required|json',
        ]);

        BookingForm::create($validated);

        return redirect()->route('dashboard.booking-forms.index')->with('success', 'Form created successfully.');
    }

    public function destroy(BookingForm $bookingForm) {
        $bookingForm->delete();
        return back()->with('success', 'Form deleted.');
    }
}
