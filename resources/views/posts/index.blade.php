@extends('layouts.app')

@section('content')
    <div class="flex justify-center">

        <div class="w-6/12 bg-gray-800 text-gray-200 p-6 rounded-lg">

            @if (session('status'))
                <div class="bg-red-500 p-4 rounded-lg mb-6 text-white text-center">
                    {{ session('status') }}
                </div>
            @endif

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
                @if($posts->count())
                    @foreach($posts as $post)
                        <div>
                            <a href="#" class="font-medium text-blue-700">{{ $post->user->name }}</a>
                            <span class="text-gray-500 text-sm">{{ $post->created_at->diffForHumans() }}</span>
                        </div>

                        <p class="mb-2">{{ $post->body }}</p>

                        @can('delete', $post)
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post" class="p-3 inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-700">Delete</button>
                            </form>
                        @endcan

                    @endforeach

                    <p class="mb-2">{{ $posts->links() }}</p>

                @else
                    <p>There are no posts</p>
                @endif
            </div>

        </div>
    </div>
@endsection

