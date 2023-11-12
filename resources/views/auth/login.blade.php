@extends('layouts.app')

@section('content')
    <div class="flex justify-center">
        <div class="w-6/12 bg-gray-800 text-gray-200 p-6 rounded-lg">

            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input
                        type="text"
                        name="email"
                        id="email"
                        placeholder="Your email address"
                        class="bg-gray-800 border-gray-700 border-2 w-full p-4 rounded-lg outline-none @error('email')
                            border-red-500
                        @enderror"
                        value="{{ old('email') }}"
                    >

                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        placeholder="Password"
                        class="bg-gray-800 border-gray-700 border-2 w-full p-4 rounded-lg outline-none @error('password')
                            border-red-500
                        @enderror"
                        value="{{ old('password') }}"
                    >

                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="mb-4">
                    <div class="flex items-center">
                        <input type="checkbox" name="remember" id="remember" class="mr-2">
                        <label for="remember">Remember me</label>
                    </div>
                </div>

                <div class="mb-4">
                    <button
                        type="submit"
                        class="bg-blue-500 text-gray-100 px-5 py-4 rounded-lg w-full"
                    >
                        Login
                    </button>
                </div>

            </form>

        </div>
    </div>
@endsection
