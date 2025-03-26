<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactForm;

class DashboardContactFormController extends Controller
{
    public function index()
    {
        $contactForms = ContactForm::latest()->get();
        return view('dashboard.pages.contact_forms.index', compact('contactForms'));
    }

    public function destroy($id)
    {
        $contactForm = ContactForm::findOrFail($id);
        $contactForm->delete();

        return redirect()->route('dashboard.contact_forms.index')->with('success', 'Contact form message deleted successfully.');
    }
}
