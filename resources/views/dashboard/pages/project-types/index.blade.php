@extends('dashboard.layouts.app')

@section('title', 'Project Types - Dashboard')

@section('content')
<div class="w-full p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-blue-600">Project Types</h1>
        <a href="{{ route('dashboard.project-types.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add New Type
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="text-left p-2">#</th>
                    <th class="text-left p-2">Type Name</th>
                    <th class="text-left p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($types as $type)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2">{{ $type->id }}</td>
                        <td class="p-2">{{ $type->name }}</td>
                        <td class="p-2 flex gap-2">
                            <a href="{{ route('dashboard.project-types.edit', $type->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-700">Edit</a>
                            <form action="{{ route('dashboard.project-types.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="text-center p-4">No project types found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
