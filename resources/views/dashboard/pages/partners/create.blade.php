@extends('dashboard.layouts.app')

@section('title', 'Add New Partner - Dashboard')

@section('content')
<div class="w-4/5 p-6">
    <h1 class="text-xl font-bold mb-4">Add New Partner</h1>

    @if($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('dashboard.partners.store') }}" class="bg-white p-6 rounded shadow-md space-y-4">
        @csrf
        <div>
            <label class="block text-gray-700 font-medium mb-2">Name</label>
            <input type="text" name="name" class="w-full border border-gray-300 p-2 rounded" required>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Email</label>
            <input type="email" name="email" class="w-full border border-gray-300 p-2 rounded" required>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Company Name</label>
            <input type="text" name="company_name" class="w-full border border-gray-300 p-2 rounded" required>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Reason for partnership</label>
            <textarea name="reason" rows="4" class="w-full border border-gray-300 p-2 rounded" required></textarea>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Phone Number</label>
            <input type="text" name="phone" class="w-full border border-gray-300 p-2 rounded" required>
        </div>
        <div>
            <label class="block text-gray-700 font-medium mb-2">Website</label>
            <input type="url" name="website" class="w-full border border-gray-300 p-2 rounded" required>
        </div>
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Save Partner</button>
    </form>
</div>
@endsection
