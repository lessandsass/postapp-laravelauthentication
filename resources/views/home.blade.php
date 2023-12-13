@extends('layouts.app')

@section('content')
<div class="flex justify-center">
    <div class="w-6/12 bg-gray-800 text-gray-200 p-6 rounded-lg text-center">

        @if (session('status'))
            <div class="bg-green-600 p-4 rounded-lg mb-6 text-white text-center">
                {{ session('status') }}
            </div>
        @endif

        Home

    </div>
</div>
@endsection
