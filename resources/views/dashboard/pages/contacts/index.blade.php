@extends('dashboard.layouts.app')

@section('title', 'Contact Messages - Dashboard')

@section('content')
<div class="w-4/5 p-6">
    <div class="flex justify-between items-center mb-4">
        <h1 class="text-xl font-bold">Contact Messages</h1>
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
                    <th class="text-left p-2">Email</th>
                    <th class="text-left p-2">Message</th>
                    <th class="text-left p-2">Date</th>
                    <th class="text-left p-2">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr class="border-b hover:bg-gray-100">
                        <td class="p-2">{{ $contact->name }}</td>
                        <td class="p-2">{{ $contact->email }}</td>
                        <td class="p-2">{{ $contact->message }}</td>
                        <td class="p-2">{{ $contact->created_at->format('d M Y') }}</td>
                        <td class="p-2">
                            <form action="{{ route('dashboard.contacts.destroy', $contact->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-700">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center py-4">No contact messages found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
