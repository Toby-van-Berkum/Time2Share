<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Document</title>
</head>
<body class="bg-slate-200">
    <header class="bg-sky-500 py-4 container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-xl font-bold flex items-center">
                <figure>
                    <img src="{{ asset('SadBread.png') }}" alt="Time2Share Logo" class="h-10 mr-2 px-2">
                </figure>
                Time2Share
            </a>
            <nav class="flex items-center">
            <ul class="flex space-x-4">
                <li><a href="#" class="text-white hover:text-gray-200">Home</a></li>
                <li><a href="#" class="text-white hover:text-gray-200">Browse</a></li>
                <li><a href="#" class="text-white hover:text-gray-200">About</a></li>
                <li><a href="#" class="text-white hover:text-gray-200">Contact</a></li>
            </ul>
            <a href="#" class="text-white hover:text-gray-200 ml-4">Login</a>
            <a href="#" class="bg-white text-blue-500 px-4 py-2 rounded-full hover:bg-gray-200 transition duration-300 ml-4">Sign Up</a>
            </nav>
    </header>

    <main>
        <h1 class="text-3xl font-bold underline">Hello Projecto!</h1>
        <button class="btn-primary">Fancy Button</button>
    </main>
</body>
</html>