<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Time2Share</title>
</head>
<body class="bg-slate-200">
    <header class="bg-sky-500 py-4 w-full flex justify-between items-center">
        <a href="#" class="text-white text-xl font-bold flex items-center">
            <figure>
                <img src="{{ asset('SadBread.png') }}" alt="Time2Share Logo" class="h-10 mr-2 px-2">
            </figure>
            Time2Share
        </a>
        <nav class="flex items-center mx-4">
        <ul class="flex space-x-4">
            <li><a href="/home" class="text-white hover:text-gray-200">Home</a></li>
            <li><a href="/browse" class="text-white hover:text-gray-200">Browse</a></li>
            <li><a href="#" class="text-white hover:text-gray-200">About</a></li>
            <li><a href="#" class="text-white hover:text-gray-200">Contact</a></li>
            <li>
                <form action="{{ route('logout') }}" method="POST" class="inline-block">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-200">Logout</button>
                </form>
            </li>
        </ul>
        </nav>
    </header>    
    <main>
        @if(auth()->check())
            <h1 class="text-3xl font-bold underline">Hello, {{ auth()->user()->name }}!</h1>
        @else
            <h1 class="text-3xl font-bold underline">Hello, Guest!</h1>
        @endif
        @include('products.index')
    </main>
</body>
</html>