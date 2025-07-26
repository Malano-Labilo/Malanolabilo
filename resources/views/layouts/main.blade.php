<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title }}</title>
    @vite('resources/css/app.css')
</head>

<body class="scroll-smooth bg-white-first font-aleo text-dark-first text-[14px]">
    <x-header />
    @yield('content')
    <x-footer />
    @vite('resources/js/app.js')
</body>

</html>
