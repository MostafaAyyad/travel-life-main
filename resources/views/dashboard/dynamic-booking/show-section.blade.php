@extends('dashboard.layouts.app')

@section('title', 'Section Details')

@section('content')
<div class="w-full p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Section Details: {{ $section->title }}</h1>

    <div class="bg-white shadow-md rounded p-4">
        <h2 class="text-xl font-semibold mb-4">Fields</h2>

        @if($section->fields->count() > 0)
            <table class="w-full border-collapse">
                <thead>
                    <tr class="border-b">
                        <th class="text-left p-2">Label</th>
                        <th class="text-left p-2">Type</th>
                        <th class="text-left p-2">Placeholder</th>
                        <th class="text-left p-2">Default Value</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($section->fields as $field)
                        <tr class="border-b hover:bg-gray-100">
                            <td class="p-2">{{ $field->label }}</td>
                            <td class="p-2">{{ ucfirst($field->type) }}</td>
                            <td class="p-2">{{ $field->placeholder }}</td>
                            <td class="p-2">{{ $field->default_value }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p class="text-center text-gray-500">No fields found for this section.</p>
        @endif

        <a href="{{ route('dashboard.dynamic-booking.index') }}" class="mt-4 inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Back to Sections</a>
    </div>
</div>
@endsection
