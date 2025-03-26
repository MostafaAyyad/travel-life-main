@extends('dashboard.layouts.app')

@section('title', 'Car Rental Offers - Dashboard')

@section('content')
<div class="w-full p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">Car Rental Offers</h1>
        <a href="{{ route('dashboard.car-rental.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add New Offer
        </a>
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white shadow-md rounded p-4 overflow-x-auto">
        <table class="w-full border-collapse text-center">
            <thead>
                <tr class="border-b bg-gray-100">
                    <th class="p-2">Image</th>
                    <th class="p-2">Title</th>
                    <th class="p-2">Description</th>
                    <th class="p-2">Created At</th>
                    <th class="p-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cars as $car)
                <tr class="border-b hover:bg-gray-50">
                    <td class="p-2">
                        <img src="{{ asset('storage/' . $car->image) }}" class="w-20 h-20 object-cover rounded" alt="Car Image">
                    </td>
                    <td class="p-2">{{ $car->title }}</td>
                    <td class="p-2">{{ \Illuminate\Support\Str::limit($car->description, 50) }}</td>
                    <td class="p-2">{{ $car->created_at->format('d M Y') }}</td>
                    <td class="p-2 flex gap-2 justify-center">
                        <a href="{{ route('dashboard.car-rental.edit', $car->id) }}" class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                        <form action="{{ route('dashboard.car-rental.destroy', $car->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this offer?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="6" class="py-4 text-gray-500">No car rental offers found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
