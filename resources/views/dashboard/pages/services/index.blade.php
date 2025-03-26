@extends('dashboard.layouts.app')

@section('title', 'Services - Dashboard')

@section('content')
<div class="w-4/5 p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Services</h1>
        <a href="{{ route('dashboard.services.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add New Service
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded p-4 overflow-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="text-left p-2">Image</th>
                    <th class="text-left p-2">Title</th>
                    <th class="text-left p-2">Description</th>
                    <th class="text-left p-2">Status</th>
                    <th class="text-left p-2">Created At</th>
                    <th class="text-left p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($services as $service)
                <tr class="border-b hover:bg-gray-100">
                    <td class="p-2">
                        <img src="{{ asset('storage/' . $service->image) }}" class="w-16 h-16 object-cover rounded">
                    </td>
                    <td class="p-2 text-blue-500">{{ $service->title }}</td>
                    <td class="p-2">{{ $service->description }}</td>
                    <td class="p-2">
                        @if($service->status == 1)
                            <span class="bg-green-200 text-green-700 px-3 py-1 rounded-full text-sm">Active</span>
                        @else
                            <span class="bg-red-200 text-red-700 px-3 py-1 rounded-full text-sm">Inactive</span>
                        @endif
                    </td>
                    <td class="p-2">{{ $service->created_at->format('d M Y') }}</td>
                    <td class="p-2 flex gap-2">
                        <a href="{{ route('dashboard.services.edit', $service->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-700">Edit</a>
                        <form action="{{ route('dashboard.services.destroy', $service->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4">No services found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
