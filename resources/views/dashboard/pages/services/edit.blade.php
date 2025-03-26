@extends('dashboard.layouts.app')
@section('title', 'Edit Service - Dashboard')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-xl font-bold">Edit Service</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('dashboard.services.update', $service->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Service Title</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Service Description</label>
            <textarea name="description" rows="4" class="form-control" required>{{ old('description', $service->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label class="form-label">Image</label>
            <input type="file" name="image" class="form-control">
            @if ($service->image)
                <img src="{{ asset('storage/' . $service->image) }}" class="w-20 mt-2 rounded shadow">
            @endif
        </div>
        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-control" required>
                <option value="1" {{ $service->status == 1 ? 'selected' : '' }}>Active</option>
                <option value="0" {{ $service->status == 0 ? 'selected' : '' }}>Inactive</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update Service</button>
    </form>
</div>
@endsection
