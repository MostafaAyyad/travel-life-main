<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServiceRequest;
use App\Models\ProjectType;

class ServiceRequestController extends Controller
{
    public function index($service_id = null)
    {
        $projectTypes = ProjectType::all();
        $selectedService = null;

        if ($service_id) {
            $selectedService = \App\Models\Service::find($service_id);
        }

        return view('pages.request-service.index', compact('projectTypes', 'selectedService'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'country' => 'required|string',
            'projectType' => 'required|string',
        ]);
        ServiceRequest::create([
            'service_id' => $request->service_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country' => $request->country,
            'project_type' => $request->projectType,
            'budget' => $request->budget,
            'time_frame' => $request->timeFrame,
            'company' => $request->company,
            'message' => $request->message,
        ]);


        return back()->with('success', 'Your request has been sent successfully!');
    }
}
