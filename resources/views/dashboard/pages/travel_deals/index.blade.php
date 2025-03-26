@extends('dashboard.layouts.app')

@section('title', 'Travel Deals - Dashboard')

@section('content')
<div class="w-full p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Travel Deals</h1>
        <a href="{{ route('dashboard.travel_deals.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add New Deal
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
                    <th class="text-left p-2">Image</th>
                    <th class="text-left p-2">Title</th>
                    <th class="text-left p-2">Description</th>
                    <th class="text-left p-2">Price</th>
                    <th class="text-left p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($travelDeals as $deal)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2">
                            <img src="{{ asset('storage/' . $deal->image) }}" class="w-16 h-16 object-cover rounded">
                        </td>
                        <td class="p-2">{{ $deal->title }}</td>
                        <td class="p-2">{{ $deal->description }}</td>
                        <td class="p-2">${{ $deal->price }}</td>
                        <td class="p-2">
                            <a href="{{ route('dashboard.travel_deals.edit', $deal->id) }}" class="text-blue-600 mr-2">Edit</a>
                            <form action="{{ route('dashboard.travel_deals.destroy', $deal->id) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="text-center py-4">No travel deals found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
