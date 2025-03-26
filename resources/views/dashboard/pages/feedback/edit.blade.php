@extends('dashboard.layouts.app')

@section('title', 'Edit Feedback')

@section('content')
<div class="w-3/5 mx-auto p-6 bg-white shadow-md rounded">
    <h1 class="text-xl font-bold mb-4">Edit Feedback</h1>

    <form action="{{ route('dashboard.feedback.update', $feedback->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Name</label>
            <input type="text" name="name" value="{{ $feedback->name }}" class="w-full border p-2 rounded" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Comment</label>
            <textarea name="comment" rows="4" class="w-full border p-2 rounded" required>{{ $feedback->comment }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 mb-2">Image (optional)</label>
            <input type="file" name="image" class="w-full">
            @if($feedback->image)
                <img src="{{ asset('storage/' . $feedback->image) }}" class="w-24 h-24 rounded mt-2">
            @endif
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
