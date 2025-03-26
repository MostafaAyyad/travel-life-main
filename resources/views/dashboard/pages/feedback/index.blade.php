@extends('dashboard.layouts.app')

@section('title', 'All Feedback')

@section('content')
<div class="w-4/5 p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Customer Feedback</h1>
        <a href="{{ route('dashboard.feedback.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add New Feedback
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded p-4 overflow-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="border-b">
                    <th class="p-2">Image</th>
                    <th class="p-2">Name</th>
                    <th class="p-2">Comment</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($feedbacks as $feedback)
                <tr class="border-b hover:bg-gray-100">
                    <td class="p-2">
                        <img src="{{ asset('storage/' . $feedback->image) }}" class="w-16 h-16 object-cover rounded">
                    </td>
                    <td class="p-2">{{ $feedback->name }}</td>
                    <td class="p-2">{{ $feedback->comment }}</td>
                    <td class="p-2">
                        <a href="{{ route('dashboard.feedback.edit', $feedback->id) }}" class="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('dashboard.feedback.destroy', $feedback->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center py-4">No feedback found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
