@extends('dashboard.layouts.app')

@section('title', 'Service Requests - Dashboard')

@section('content')
<div class="w-4/5 p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-blue-700">Service Requests</h1>
        <a href="{{ route('dashboard.project-types.create') }}" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
            + Add Project Type
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded p-4 overflow-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b bg-gray-50">
                    <th class="text-left p-3">Name</th>
                    <th class="text-left p-3">Email</th>
                    <th class="text-left p-3">Country</th>
                    <th class="text-left p-3">Project Type</th>
                    <th class="text-left p-3">Budget</th>
                    <th class="text-left p-3">Company</th>
                    <th class="text-left p-3">Service Info</th>
                    <th class="text-left p-3">Date</th>
                    <th class="text-left p-3">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($requests as $request)
                    <tr class="border-b hover:bg-gray-50">
                        <td class="p-3">{{ $request->name }}</td>
                        <td class="p-3">{{ $request->email }}</td>
                        <td class="p-3">{{ $request->country }}</td>
                        <td class="p-3">{{ $request->project_type }}</td>
                        <td class="p-3">{{ $request->budget ?? '-' }}</td>
                        <td class="p-3">{{ $request->company ?? '-' }}</td>
                        <td class="p-3">
                            @if($request->service_id && $request->service)
                                <div class="flex items-center gap-2">
                                    <img src="{{ asset('storage/' . $request->service->image) }}" alt="Service" class="w-12 h-12 object-cover rounded">
                                    <div>
                                        <strong>{{ $request->service->title }}</strong>
                                        <p class="text-gray-500 text-sm">{{ Str::limit($request->service->description, 40) }}</p>
                                    </div>
                                </div>
                            @else
                                <span class="text-gray-400 italic">N/A</span>
                            @endif
                        </td>
                        <td class="p-3">{{ $request->created_at->format('d M Y') }}</td>
                        <td class="p-3">
                            <form action="{{ route('dashboard.service_requests.destroy', $request->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9" class="text-center py-5 text-gray-500">No service requests found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
