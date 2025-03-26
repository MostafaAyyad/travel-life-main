@extends('dashboard.layouts.app')

@section('title', 'Partners - Dashboard')

@section('content')
<div class="w-4/5 p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Partners</h1>
        <a href="{{ route('dashboard.partners.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            + Add New Partner
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
                    <th class="text-left p-2">Name</th>
                    <th class="text-left p-2">Company Name</th>
                    <th class="text-left p-2">Email</th>
                    <th class="text-left p-2">Phone</th>
                    <th class="text-left p-2">Website</th>
                    <th class="text-left p-2">Reason</th>
                    <th class="text-left p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($partners as $partner)
                <tr class="border-b hover:bg-gray-100">
                    <td class="p-2">{{ $partner->name }}</td>
                    <td class="p-2">{{ $partner->company_name }}</td>
                    <td class="p-2">{{ $partner->email }}</td>
                    <td class="p-2">{{ $partner->phone }}</td>
                    <td class="p-2"><a href="{{ $partner->website }}" target="_blank" class="text-blue-500">Visit</a></td>
                    <td class="p-2">{{ $partner->reason }}</td>
                    <td class="p-2">
                        <form action="{{ route('dashboard.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-4">No partners found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
