<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset('themes/chasa/assets/img/favicon.ico') }}">

    <title>{{ $attributes->has('title') ? "{$attributes->get('title')} - " : '' }}{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('themes/chasa/assets/css/app.bundle.css') }}">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131682452-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());

        gtag('config', 'UA-131682452-1');
    </script>
</head>
<body class="scroll_hidden">
<script type="text/javascript" id="cookieinfo"
        data-bg="rgba(0,0,0,0.8)"
        data-fg="#ffffff"
        data-link="#d41821"
        data-divlink="#d41821"
        data-divlinkbg="none"
        data-cookie="CookieInfoScript"
        data-text-align="center"
        data-close-text="Accept my cookies [&#10007;]"
        data-font-size="12px"
        data-linkmsg="Read our policy"
        data-moreinfo="/page/cookies"
        data-message="We use cookies on this website to optimise our service.">
</script>


@livewire('navigation-menu')

<x-flash-message-bootstrap/>

{{ $slot }}

@livewireScripts
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<script src="{{ mix('themes/chasa/assets/js/app.bundle.js') }}" defer></script>
</body>
</html>
