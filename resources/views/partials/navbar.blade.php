<header>
    <nav class="bg-blue-600 shadow-lg">
        <div class="container mx-auto px-4 py-3 flex justify-between items-center" style="margin:
        0px;">
            <a href="index.html" class="text-white text-2xl font-bold">LifeEase Travel</a>
            <div class="hidden md:flex space-x-6">
                <a href="{{ route('home') }}" class="text-white  font-bold text-lg hover:text-gray-300 transition">Home</a>
                <a href="{{ route('about') }}" class="text-white font-bold text-lg hover:text-gray-300 transition">About</a>
                <a href="{{ route('partner') }}" class="text-white font-bold text-lg hover:text-gray-300 transition">Partners</a>
                <a href="{{ route('services.index') }}" class="text-white font-bold text-lg hover:text-gray-300 transition">Service</a>
                <a href="{{ route('contactUs') }}"
                    class="text-white font-bold text-lg hover:text-gray-300 transition">Contact</a>
                <a href="{{ route('requestservice') }}"
                    class="text-white font-bold text-lg hover:text-gray-300 transition">Request Service</a>
            </div>
            <div class="hidden md:flex space-x-4">
                @auth
                    <a href="{{ route('dashboard.profile.edit') }}"
                       class="bg-white text-blue-600 px-4 py-2 rounded-full shadow hover:bg-gray-200 transition">
                        Profile
                    </a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="bg-blue-500 text-white px-4 py-2 rounded-full shadow hover:bg-blue-800 transition">
                            Logout
                        </button>
                    </form>
                @endauth

                @guest
                    <a href="{{ route('login') }}"
                        class="bg-white text-blue-600 px-4 py-2 rounded-full shadow hover:bg-gray-200 transition">
                        Sign In
                    </a>
                    <a href="{{ route('signup') }}"
                        class="bg-blue-500 text-white px-4 py-2 rounded-full shadow hover:bg-blue-800 transition">
                        Sign Up
                    </a>
                @endguest
            </div>

            <button class="md:hidden text-white text-2xl" id="menu-btn">☰</button>
        </div>
        <div class="hidden md:hidden bg-blue-600 p-4" id="mobile-menu">
            <a href="{{ route('home') }}" class="block text-white py-2 hover:text-gray-300">Home</a>
            <a href="{{ route('about') }}" class="block text-white py-2 hover:text-gray-300">About</a>
            <a href="{{ route('partner') }}" class="block text-white py-2 hover:text-gray-300">Partners</a>
            <a href="{{ route('services.index') }}" class="block text-white py-2 hover:text-gray-300">Service</a>
            <a href="{{ route('contactUs') }}" class="block text-white py-2 hover:text-gray-300">Contact</a>
            <a href="{{ route('services.index') }}" class="block text-white py-2 hover:text-gray-300">Request Service</a>
            @auth
        <a href="{{ route('dashboard.profile.edit') }}" class="block text-white py-2 hover:text-gray-300">Profile</a>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="block text-white py-2 hover:text-gray-300 text-left w-full">Logout</button>
        </form>
    @endauth

    @guest
        <a href="{{ route('login') }}" class="block text-white py-2 hover:text-gray-300">Sign In</a>
        <a href="{{ route('signup') }}" class="block text-white py-2 hover:text-gray-300">Sign Up</a>
    @endguest
        </div>
    </nav>
</header>
