<div class="container mx-auto bg-white p-8 rounded-lg shadow-lg max-w-2xl">
    <div class="text-center mb-8">
        <h1 class="text-3xl font-bold text-blue-600">Edit Profile</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success text-green-700 text-center mb-4">{{ session('success') }}</div>
    @endif
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4">
            <strong class="font-bold">there is errors:</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form class="space-y-6" method="POST" action="{{ route('dashboard.profile.update') }}">
        @csrf

        <div class="flex flex-col">
            <label class="text-blue-600 font-medium mb-2">first Name</label>
            <input type="text" name="first_name" value="{{ $user->first_name }} "
                class="px-4 py-4 border border-blue-500 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>
        <div class="flex flex-col">
            <label class="text-blue-600 font-medium mb-2">last Name</label>
            <input type="text" name="last_name" value="{{ $user->last_name }} "
                class="px-4 py-4 border border-blue-500 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>
        <div class="flex flex-col">
            <label class="text-blue-600 font-medium mb-2">Email</label>
            <input type="email" name="email" value="{{ $user->email }}"
                class="px-4 py-4 border border-blue-500 rounded focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>
        <div class="flex flex-col">
            <label class="text-blue-600 font-medium mb-2">New Password (leave empty to keep current password)</label>
            <input type="password" name="password"
                class="px-4 py-4 border border-blue-500 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>

        <div class="flex flex-col">
            <label class="text-blue-600 font-medium mb-2">Confirm New Password</label>
            <input type="password" name="password_confirmation"
                class="px-4 py-4 border border-blue-500 rounded focus:outline-none focus:ring-2 focus:ring-blue-600">
        </div>

        <div class="flex justify-center">
            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-600">Save Changes</button>
        </div>
    </form>
</div>
