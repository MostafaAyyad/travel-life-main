<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\ServiceRequest;
use Illuminate\Http\Request;

class DashboardServiceRequestController extends Controller
{
    public function index()
    {
        $requests = ServiceRequest::latest()->get();
        return view('dashboard.pages.service_requests.index', compact('requests'));
    }

    public function destroy($id)
    {
        $request = ServiceRequest::findOrFail($id);
        $request->delete();

        return redirect()->route('dashboard.service_requests.index')->with('success', 'Service request deleted successfully.');
    }
}
