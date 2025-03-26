<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProjectType;

class ProjectTypeController extends Controller
{
    public function index()
    {
        $types = ProjectType::all();
        return view('dashboard.pages.project-types.index', compact('types'));
    }

    public function create()
    {
        return view('dashboard.pages.project-types.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        ProjectType::create(['name' => $request->name]);

        return redirect()->route('dashboard.project-types.index')->with('success', 'Project type added successfully.');
    }

    public function edit(ProjectType $projectType)
    {
        return view('dashboard.pages.project-types.edit', compact('projectType'));
    }

    public function update(Request $request, ProjectType $projectType)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $projectType->update(['name' => $request->name]);

        return redirect()->route('dashboard.project-types.index')->with('success', 'Project type updated successfully.');
    }

    public function destroy(ProjectType $projectType)
    {
        $projectType->delete();
        return redirect()->route('dashboard.project-types.index')->with('success', 'Project type deleted successfully.');
    }
}
