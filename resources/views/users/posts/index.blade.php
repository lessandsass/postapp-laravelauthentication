@extends('layouts.app')

@section('content')
    <div class="flex justify-center">

        <div class="w-6/12 bg-gray-800 text-gray-200 p-6 rounded-lg">

            <div class="mt-3">
                <h1 class="text-lg font-medium mb-6">{{ $user->name }}'s Posts ({{ $posts->count() }})</h1>
                @if($posts->count())
                    @foreach($posts as $post)
                        <div>
                            <div class="font-medium text-blue-700">{{ $post->user->name }}</div>
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

