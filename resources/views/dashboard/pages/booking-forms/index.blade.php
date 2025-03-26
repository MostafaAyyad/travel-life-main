@extends('dashboard.layouts.app')
@section('title', 'Dynamic Booking Sections')
@section('content')
<div class="p-6">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Booking Sections</h1>
        <a href="{{ route('dashboard.dynamic-booking.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">+ Add New Section</a>
    </div>
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 mb-4 rounded">{{ session('success') }}</div>
    @endif
    <div class="bg-white shadow rounded p-4">
        <table class="w-full border-collapse">
            <thead>
                <tr>
                    <th class="p-2 text-left">Title</th>
                    <th class="p-2 text-left">Fields Count</th>
                    <th class="p-2 text-left">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sections as $section)
                <tr>
                    <td class="p-2">{{ $section->title }}</td>
                    <td class="p-2">{{ $section->fields->count() }}</td>
                    <td class="p-2">
                        <a href="{{ route('dashboard.dynamic-booking.fields', $section->id) }}" class="text-blue-600">Add Fields</a>
                        <form action="{{ route('dashboard.dynamic-booking.destroy', $section) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Delete this section?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
