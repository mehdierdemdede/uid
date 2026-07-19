<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'UID — Union of International Democrats')</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('images/uid.svg') }}">
    <link rel="alternate icon" href="{{ asset('images/uid.svg') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-white font-sans text-slate-900 antialiased">
    @include('site.partials.header')
    <main>
        @yield('content')
    </main>
    @include('site.partials.footer')
</body>
</html>
