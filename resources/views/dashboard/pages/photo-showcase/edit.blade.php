@extends('dashboard.layouts.app')

@section('title', 'Edit Photo')

@section('content')
<div class="w-4/5 p-6">
    <h1 class="text-xl font-bold mb-4">Edit Photo</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.photo-showcases.update', $photo->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded shadow">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold mb-2">Title</label>
            <input type="text" name="title" value="{{ $photo->title }}" class="w-full border p-2 rounded" required>
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-2">Description</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="3" required>{{ $photo->description }}</textarea>
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-2">Current Image</label>
            <img src="{{ asset('storage/' . $photo->image) }}" class="w-32 h-32 object-cover rounded mb-4">
        </div>
        <div class="mb-4">
            <label class="block font-bold mb-2">Change Image (optional)</label>
            <input type="file" name="image" class="w-full border p-2 rounded">
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-800">Update Photo</button>
    </form>
</div>
@endsection
