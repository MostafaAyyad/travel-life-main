@extends('dashboard.layouts.app')

@section('title', 'Add Fields')

@section('content')
<div class="w-full p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Add Fields for Section: {{ $section->title }}</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.dynamic-booking.store-fields', $section->id) }}" method="POST" class="bg-white shadow-md rounded p-4" id="dynamic-fields-form">
        @csrf

        <div id="field-container"></div>

        <button type="button" onclick="addField()" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-700 mb-4">+ Add Another Field</button>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Fields</button>
    </form>
</div>

<script>
    let fieldIndex = 0;

    function addField() {
        const container = document.getElementById('field-container');
        const fieldHtml = `
            <div class="border p-4 rounded mb-4">
                <input type="text" name="fields[${fieldIndex}][label]" placeholder="Field Label" class="w-full border p-2 mb-2 rounded" required>
                <input type="text" name="fields[${fieldIndex}][placeholder]" placeholder="Placeholder" class="w-full border p-2 mb-2 rounded">
                <select name="fields[${fieldIndex}][type]" class="w-full border p-2 mb-2 rounded" onchange="showSelectOptions(this, ${fieldIndex})" required>
                    <option value="text">Text</option>
                    <option value="email">Email</option>
                    <option value="date">Date</option>
                    <option value="select">Select</option>
                </select>
                <div id="select-options-${fieldIndex}" class="hidden">
                    <input type="text" name="fields[${fieldIndex}][default_value]" placeholder="Select Options (comma separated)" class="w-full border p-2 mb-2 rounded">
                </div>
                <label class="flex items-center space-x-2">
                    <input type="checkbox" name="fields[${fieldIndex}][required]">
                    <span>Required Field</span>
                </label>
            </div>
        `;

        container.insertAdjacentHTML('beforeend', fieldHtml);
        fieldIndex++;
    }

    function showSelectOptions(selectElement, index) {
        const optionsContainer = document.getElementById(`select-options-${index}`);
        if (selectElement.value === 'select') {
            optionsContainer.classList.remove('hidden');
        } else {
            optionsContainer.classList.add('hidden');
        }
    }
</script>
@endsection
