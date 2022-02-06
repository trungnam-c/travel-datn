<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- những file dùng chung để ở đây --}}
    
    {{--  --}}
    {{-- những file dùng riêng để bên tron head --}}
    @yield('head')
    {{--  --}}
    <title>@yield('title')</title>
</head>
<body>
    menu từ file head
    @yield('main')
</body>
</html>