@extends('dashboard.layouts.app')

@section('title', 'Create Booking Section')

@section('content')
<div class="w-full p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Add New Booking Form Section</h1>

    <form action="{{ route('dashboard.dynamic-booking.store-section') }}" method="POST" class="bg-white shadow-md rounded p-4">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-bold mb-2">Section Title</label>
            <input type="text" name="title" id="title" class="w-full border p-2 rounded" placeholder="Enter section title" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    </form>
</div>
@endsection
