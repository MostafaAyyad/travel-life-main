@extends('layouts.app')

@section('title', 'Login - LifeEase Travel')

@section('content')
    <section class="lo mt-5">
        <div class="container-fluid">
            <div class="container">
            <div class="row">
                <div class="col-md-3"></div>

                <div class="col-md-6">

                    <div class="log-form">
                    <form method="POST" action="{{ route('login.submit') }}" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
                        @csrf
                        <h1 class="text-5xl text-center font-bold text-gray-800 mb-4">Log in</h1>
                        <p class="text-center text-gray-600 mb-6">welcom back !</p>

                        @if ($errors->any())
                        <div class="mb-3 text-red-500">
                            @foreach ($errors->all() as $error)
                                <p>{{ $error }}</p>
                            @endforeach
                        </div>
                        @endif

                        <div class="mb-4">
                            <label for="email" class="block text-gray-700 text-lg font-semibold mb-1">Email</label>
                            <input type="email" id="email" placeholder="Email" name="email"
                                class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="block text-gray-700 text-lg font-semibold mb-1">Password</label>
                            <input type="password" id="password" placeholder="Password"  name="password"
                                class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                required>
                        </div>

                        <button type="submit"
                                class="w-full bg-blue-500 text-white py-3 rounded-md font-bold text-lg shadow-md hover:bg-blue-600">
                            Log in
                        </button>

                        <hr class="my-4">

                        <p class="text-center text-gray-600">
                            Don't have an account?
                            <a href="{{ route('signup') }}" class="text-blue-600 hover:underline">Signup</a><br>
                           
                        </p>
                    </form>

                    </div>

                </div>


            <div class="col-md-3"></div>
        </div>
        </div>

    </div>
    </section>
@endsection
