@extends('dashboard.layouts.app')

@section('title', 'Add Feedback')

@section('content')
<div class="w-3/5 mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-xl font-bold mb-4">Add New Feedback</h1>

    <form action="{{ route('dashboard.feedback.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Comment</label>
            <textarea name="comment" rows="4" class="w-full border p-2 rounded" required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Image</label>
            <input type="file" name="image" class="w-full">
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save</button>
    </form>
</div>
@endsection
