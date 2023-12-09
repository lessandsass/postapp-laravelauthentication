@extends('layouts.app')

@section('content')
    <div class="flex justify-center">

        <div class="w-6/12 bg-gray-800 text-gray-200 p-6 rounded-lg">

            @guest
                <p>Please log in to create posts</p>
            @endguest

            @auth
                <form action="{{ route('posts') }}" method="post">
                    @csrf

                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea
                            name="body"
                            id="body"
                            cols="30"
                            rows="4"
                            class="bg-gray-800 border-gray-700 border-2 w-full p-4 rounded-lg outline-none resize-none @error('body') border-2 border-red-500 @enderror"
                            placeholder="Post Something . . . "
                        ></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror

                    </div>

                    <div>
                        <button type="submit" class="bg-blue-500 text-white px-8 py-3 rounded-lg font-medium">Post</button>
                    </div>
                </form>
            @endauth

            <div class="mt-3">
                Post index
            </div>

        </div>
    </div>
@endsection

