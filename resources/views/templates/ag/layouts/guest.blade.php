<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('themes/admin/assets/css/app.bundle.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('themes/admin/assets/js/app.bundle.js') }}" defer></script>
    </head>
    <body class="bg-light font-sans antialiased">
    <x-jet-banner />
    @livewire('navigation-menu')

    <!-- Page Heading -->
    @if(!empty($header))
        <header class="d-flex py-3 bg-white shadow-sm border-bottom">
            <div class="container d-flex align-items-center justify-content-between">
                {{ $header }}
            </div>
        </header>
    @endif
    <!-- Page Content -->
    <main class="container my-5">
        <x-flash-message-bootstrap/>

        {{ $slot }}
    </main>
    </body>
</html>
