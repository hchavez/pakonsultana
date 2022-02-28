<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body style="background: #ffffff !important">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="background: hsl(0, 0%, 100%) !important">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img class="img-profile" src="<?php echo url('/'); ?>/images/logo-front.jpg" style="height: 65px;">
                </a>
                <br>
               
            </div>
        </nav>

        <main class="py-4" style="background: hsl(195deg, 79%, 47%) !important">
            @yield('content')
        </main>
    </div>
</body>
</html>
