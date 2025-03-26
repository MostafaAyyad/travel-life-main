@extends('dashboard.layouts.app')

@section('title', 'Edit Travel Deal')

@section('content')
<div class="w-4/5 mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6 text-center text-blue-700">Edit Travel Deal</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.travel_deals.update', $deal->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-blue-700 font-semibold mb-2">Title</label>
            <input type="text" name="title" value="{{ old('title', $deal->title) }}" class="w-full border border-gray-300 p-3 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-blue-700 font-semibold mb-2">Description</label>
            <textarea name="description" rows="4" class="w-full border border-gray-300 p-3 rounded" required>{{ old('description', $deal->description) }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-blue-700 font-semibold mb-2">Price (USD)</label>
            <input type="number" name="price" value="{{ old('price', $deal->price) }}" class="w-full border border-gray-300 p-3 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-blue-700 font-semibold mb-2">Current Image</label>
            <img src="{{ asset('storage/' . $deal->image) }}" class="w-32 h-32 object-cover rounded mb-3">
        </div>

        <div class="mb-4">
            <label class="block text-blue-700 font-semibold mb-2">Change Image (Optional)</label>
            <input type="file" name="image" class="w-full border border-gray-300 p-3 rounded">
        </div>

        <div class="text-center">
            <button type="submit" class="bg-blue-700 text-white px-6 py-2 rounded hover:bg-blue-800">Update Deal</button>
        </div>
    </form>
</div>
@endsection
