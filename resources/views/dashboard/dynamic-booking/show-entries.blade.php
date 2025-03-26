@extends('dashboard.layouts.app')

@section('title', 'Booking Entries')

@section('content')
<div class="w-full p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">All Booking Entries</h1>

    @foreach($sections as $section)
    <h2 class="text-lg font-semibold mt-6 mb-2">Section Name : {{ $section->title }}</h2>
    <div class="bg-white shadow rounded p-4 overflow-x-auto">
        @if($section->entries->count() > 0)
        <table class="w-full border-collapse mt-2">
            <thead>
                <tr class="border-b bg-gray-100">
                    <th class="text-left p-2">Entry ID</th>
                    <th class="text-left p-2">Data</th>
                    <th class="text-left p-2">Submitted At</th>
                </tr>
            </thead>
            <tbody>

                @foreach($section->entries as $entry)

                <tr class="border-b">
                    <td class="p-2">{{ $entry->id }}</td>
                    <td class="p-2">
                        @php
                        $formData = $entry->form_data;
                        @endphp
                        <ul>
                            @foreach($formData as $fieldId => $value)
                            @php
                            $field = $section->fields->where('id', $fieldId)->first();
                            @endphp
                            <li><strong>{{ $field ? $field->label : 'Field #' . $fieldId }}:</strong> {{ $value }}</li>
                            @endforeach
                        </ul>

                    </td>
                    <td class="p-2">{{ $entry->created_at->format('d M Y - H:i') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
        <p class="text-gray-500">No entries found for this section.</p>
        @endif
    </div>
    @endforeach
</div>
@endsection
