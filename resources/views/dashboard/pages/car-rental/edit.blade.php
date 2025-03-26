@extends('dashboard.layouts.app')

@section('title', 'Edit Car Rental Offer')

@section('content')
<div class="w-4/5 p-6 mx-auto">
    <h1 class="text-2xl font-bold mb-6">Edit Car Rental Offer</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.car-rental.update', $carRentalOffer->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-semibold mb-2">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" value="{{ $carRentalOffer->title }}" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Description</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="4" required>{{ $carRentalOffer->description }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Current Image</label>
            <img src="{{ asset('storage/' . $carRentalOffer->image) }}" class="w-32 h-32 rounded mb-3">

            <label class="block font-semibold mb-2">Upload New Image (optional)</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update Offer</button>
    </form>
</div>
@endsection
