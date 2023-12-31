<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Postapp - Laravel Authentication</title>

    <script src="https://cdn.tailwindcss.com"></script>

</head>
<body class="bg-gray-900">

    <nav class="p-6 bg-gray-800 text-gray-300 flex justify-between">
        <ul class="flex items-center">
            <li><a href="" class="p-3">Home</a></li>
            <li><a href="{{ route('dashboard') }}" class="p-3">Dashboard</a></li>
            <li><a href="{{ route('posts') }}" class="p-3">Posts</a></li>
        </ul>

        <ul class="flex items-center">

            @auth
                <li><a href="#" class="p-3">{{ auth()->user()->name }}</a></li>

                <li>
                    <form action="{{ route('logout') }}" method="post" class="p-3 inline">
                        @csrf
                        <button type="submit">Logout</button>
                    </form>
                </li>

            @endauth

            @guest
                <li><a href="{{ route('login') }}" class="p-3">Login</a></li>
                <li><a href="{{ route('register') }}" class="p-3">Register</a></li>
            @endguest

        </ul>
    </nav>

    <div class="container mx-auto mt-6 px-6">
        @yield('content')
    </div>
</body>
</html>
