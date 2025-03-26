@extends('dashboard.layouts.app')

@section('title', 'Booking Sections')

@section('content')
<div class="w-full p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Booking Form Sections</h1>

    <a href="{{ route('dashboard.dynamic-booking.create') }}" class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">+ Add New Section</a>

    <div class="bg-white shadow-md rounded p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="text-left p-2">Title</th>
                    <th class="text-left p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sections as $section)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2">{{ $section->title }}</td>
                        <td class="p-2">
                            <a href="{{ route('dashboard.dynamic-booking.create-fields', $section->id) }}" class="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-700">Add Fields</a>
                            <a href="{{ route('dashboard.dynamic-booking.show-section', $section->id) }}" class="bg-gray-500 text-white px-2 py-1 rounded hover:bg-gray-700">View</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
