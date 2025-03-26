<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class DashboardContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->get();
        return view('dashboard.pages.contacts.index', compact('contacts'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('dashboard.contacts.index')->with('success', 'Message deleted successfully.');
    }
}
