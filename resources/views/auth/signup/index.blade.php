@extends('layouts.app')

@section('title', 'Regestration - LifeEase Travel')

@section('content')
    <section class="lo mt-5">
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="log-form">
                            @if($errors->any())
                                <div class="mt-4 text-red-600">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                </div>
                            @endif
                            <form method="POST" action="{{ route('signup.submit') }}" class="max-w-lg mx-auto bg-white p-6 rounded-lg shadow-md">
                                @csrf
                                <h1 class="text-5xl text-center font-bold text-gray-800 mb-4">Signup</h1>
                                <p class="text-center text-gray-600 mb-6">Create an Account</p>

                                <div class="mb-4">
                                    <label for="fname" class="block text-gray-700 text-lg font-semibold mb-1">First
                                        Name</label>
                                    <input type="text" id="fname" placeholder="First Name"  name="first_name"
                                        class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="lname" class="block text-gray-700 text-lg font-semibold mb-1">Last
                                        Name</label>
                                    <input type="text" id="lname" placeholder="Last Name" name="last_name"
                                        class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="email" class="block text-gray-700 text-lg font-semibold mb-1">Email</label>
                                    <input type="email" id="email" placeholder="Email" name="email"
                                        class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="password"
                                        class="block text-gray-700 text-lg font-semibold mb-1">Password</label>
                                    <input type="password" id="password" placeholder="Password"  name="password"
                                        class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        required>
                                </div>

                                <div class="mb-4">
                                    <label for="rewritePassword"
                                        class="block text-gray-700 text-lg font-semibold mb-1">Rewrite Password</label>
                                    <input type="password" id="rewritePassword" placeholder="Rewrite Password" name="password_confirmation"
                                        class="w-full border border-gray-300 p-2 rounded-md focus:ring-2 focus:ring-blue-500 focus:outline-none"
                                        required>
                                </div>

                                <button type="submit"
                                    class="w-full bg-blue-500 text-white py-3 rounded-md font-bold text-lg shadow-md hover:bg-blue-600">
                                    Signup
                                </button>

                                <hr class="my-4">

                                <p class="text-center text-gray-600">
                                    Already a user?
                                    <a href="{{ route('login') }}" class="text-blue-600 hover:underline">Login</a>
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
