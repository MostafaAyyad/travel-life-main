@extends('dashboard.layouts.app')

@section('title', 'Add Car Rental Offer')

@section('content')
<div class="w-4/5 p-6 mx-auto">
    <h1 class="text-2xl font-bold mb-6">Add New Car Rental Offer</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.car-rental.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow-md">
        @csrf
        <div class="mb-4">
            <label class="block font-semibold mb-2">Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Description</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="4" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-2">Image</label>
            <input type="file" name="image" class="w-full border p-2 rounded" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Offer</button>
    </form>
</div>
@endsection
