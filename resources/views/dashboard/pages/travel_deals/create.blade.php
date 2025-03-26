@extends('dashboard.layouts.app')

@section('title', 'Add Travel Deal')

@section('content')
<div class="w-full p-6">
    <h1 class="text-xl font-bold mb-4">Add New Travel Deal</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                   <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.travel_deals.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 shadow rounded">
        @csrf
        <div class="mb-4">
            <label class="block mb-2 font-medium">Title</label>
            <input type="text" name="title" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-medium">Description</label>
            <textarea name="description" rows="4" class="border p-2 w-full" required></textarea>
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-medium">Price</label>
            <input type="text" name="price" class="border p-2 w-full" required>
        </div>
        <div class="mb-4">
            <label class="block mb-2 font-medium">Image</label>
            <input type="file" name="image" class="border p-2 w-full" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Deal</button>
    </form>
</div>
@endsection
