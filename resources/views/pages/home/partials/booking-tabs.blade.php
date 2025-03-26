@section('style')

<style>
    .active {
        border-bottom: #2563eb 4px solid !important;

    }
    .input-style-custom {
        padding: 10px 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
    }
</style>
@endsection
<section class="py-10 bg-gray-100">
    <div class="container mx-auto bg-white shadow-xl rounded-lg p-6">
        <h1 class="text-left mb-4 font-extrabold text-4xl text-blue-600">Book Now</h1>
        <div class="flex border-b pb-3 mb-4 space-x-4">
            @foreach($sections as $index => $section)
            <button onclick="showTab('{{ $section->id }}', this)"
                class="tab-btn px-4 py-2 text-lg font-semibold  {{ $index == 0 ? 'active' : '' }} hover:border-blue-600 transition"
                id="tab-btn-{{ $section->id }}">
                {{ $section->title }}
            </button>
            @endforeach
        </div>
        @foreach($sections as $index => $section)
        <div id="{{ $section->id }}" class="tab-content {{ $index != 0 ? 'hidden' : '' }}">
            <form action="{{ route('dashboard.dynamic-booking.store-entry', $section->id) }}" method="POST"
                class="grid grid-cols-1 md:grid-cols-4 gap-4">
                @csrf
                @foreach($section->fields as $field)
                @if(in_array($field->type, ['text', 'email', 'date']))
                <input type="{{ $field->type }}" name="fields[{{ $field->id }}]" placeholder="{{ $field->placeholder }}"
                    class="input-field input-style-custom" @if($field->required) required @endif>
                @elseif($field->type === 'select')
                <select name="fields[{{ $field->id }}]" class="input-field input-style-custom" @if($field->required)
                    required @endif>
                    @foreach(explode(',', $field->default_value) as $option)
                    <option>{{ trim($option) }}</option>
                    @endforeach
                </select>
                @endif
                @endforeach
                <button type="submit"
                    class="btn-primary bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition col-span-full">Submit</button>
            </form>
        </div>
        @endforeach
    </div>
</section>
@push('scripts')
<script>
    function showTab(tabId, button) {
    document.querySelectorAll('.tab-content').forEach(tab => {
        tab.classList.add('hidden');
    });
    document.getElementById(tabId).classList.remove('hidden');
    document.querySelectorAll('.tab-btn').forEach(b => {
        b.classList.remove('active');
    });
    button.classList.add('active');
}
</script>
@endpush
