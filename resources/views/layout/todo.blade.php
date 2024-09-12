<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>@yield('title')</title>
</head>
<body>
    <nav>
        <a href="{{route('todos.index')}}">Home</a>
        <a href="{{route('todos.create')}}">New Todo</a>
        <a href="{{route('profil.index')}}">Profil</a>
        <a href="{{route('profil.logout')}}">Logout</a>
    </nav>
    <section>
        @yield('content')
    </section>
</body>
</html>