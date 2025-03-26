@extends('dashboard.layouts.app')

@section('title', 'Photo Showcase - Dashboard')

@section('content')
<div class="w-4/5 p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Photo Showcase</h1>
        <a href="{{ route('dashboard.photo-showcases.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">
            + Add New Photo
        </a>
    </div>

    @if (session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
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
                    <th class="text-left p-2">Created At</th>
                    <th class="text-left p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($photos as $photo)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2">
                            <img src="{{ asset('storage/' . $photo->image) }}" class="w-16 h-16 object-cover rounded">
                        </td>
                        <td class="p-2">{{ $photo->title }}</td>
                        <td class="p-2">{{ $photo->description }}</td>
                        <td class="p-2">{{ $photo->created_at->format('d M Y') }}</td>
                        <td class="p-2 flex gap-2">
                            <a href="{{ route('dashboard.photo-showcases.edit', $photo->id) }}" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500">Edit</a>
                            <form action="{{ route('dashboard.photo-showcases.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this photo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No photos found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
