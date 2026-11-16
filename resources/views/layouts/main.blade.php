<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Risorts World'))</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

    @vite(['resources/scss/app.scss', 'resources/js/main.js'])
    @stack('styles')
</head>
<body class="d-flex flex-column min-vh-100 bg-body-tertiary">
    @include('partials.navbar')

    <main class="flex-grow-1">
        @hasSection('hero')
            @yield('hero')
        @endif

        <div class="container py-4">
            @include('partials.flash')

            @yield('content')
        </div>
    </main>

    <footer class="py-3 border-top bg-body text-center text-body-secondary small">
        &copy; {{ date('Y') }} {{ config('app.name', 'Risorts World') }}
    </footer>

    @stack('scripts')
</body>
</html>
