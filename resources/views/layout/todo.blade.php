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
<body>
    <nav>
        <a class="hover:text-blue-400" href="{{route('todos.index')}}">Home</a>
        <a class="hover:text-blue-400" href="{{route('todos.create')}}">New Todo</a>
        <a class="hover:text-blue-400" href="{{route('profil.index')}}">Profil</a>
        <a class="hover:text-blue-400" href="{{route('profil.logout')}}">Logout</a>
    </nav>
    <section>
        @yield('content')
    </section>
</body>
</html>