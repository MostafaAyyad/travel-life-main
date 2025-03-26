@extends('dashboard.layouts.app')

@section('title', 'Edit Project Type')

@section('content')
<div class="w-full p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Edit Project Type: {{ $projectType->name }}</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.project-types.update', $projectType->id) }}" method="POST" class="bg-white shadow-md rounded p-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Project Type Name</label>
            <input type="text" name="name" value="{{ $projectType->name }}" class="w-full border p-2 rounded" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
    </form>
</div>
@endsection
