@extends('dashboard.layouts.app')
@section('title', 'Create Booking Section')
@section('content')
<div class="p-6">
    <h1 class="text-2xl font-bold mb-4">Add New Booking Section</h1>
    <form action="{{ route('dashboard.dynamic-booking.store-section') }}" method="POST" class="bg-white p-4 rounded shadow">
        @csrf
        <div class="mb-4">
            <label class="block mb-1 font-semibold">Section Title</label>
            <input type="text" name="title" class="w-full border p-2 rounded" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Next</button>
    </form>
</div>
@endsection
