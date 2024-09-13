<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body class="bg-gray-100">
    <header class="bg-white p-4 shadow-sm">
    <nav class="max-w-screen-xs flex items-center justify-evenly mx-auto font-medium">
        <a class="hover:text-blue-400" href="{{route('todos.index')}}" class="">Home</a>
        <a class="hover:text-blue-400" href="{{route('todos.create')}}" class="">New Todo</a>
        <a class="hover:text-blue-400" href="{{route('profil.index')}}" class="">Profil</a>
        <a class="hover:text-blue-400" href="{{route('profil.logout')}}" class="">Logout</a>
    </nav>
    </header>
    <section class="p-4 flex flex-col">
        @yield('content')
    </section>
    @yield('script')
</body>
</html>