@extends('dashboard.layouts.app')

@section('title', 'Add Project Type')

@section('content')
<div class="w-full p-6">
    <h1 class="text-2xl font-bold text-blue-600 mb-4">Add New Project Type</h1>

    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.project-types.store') }}" method="POST" class="bg-white shadow-md rounded p-4">
        @csrf
        <div class="mb-4">
            <label class="block mb-2 font-semibold">Project Type Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" placeholder="Enter project type" required>
        </div>
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Save</button>
    </form>
</div>
@endsection
