<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {!! SEO::generate() !!}

        <link rel="stylesheet" href="{{asset('css/reset.css')}}">
        <link href="https://use.fontawesome.com/releases/v6.1.1/css/all.css" rel="stylesheet">
        <link rel="stylesheet" href="{{asset('css/base.css')}}">
        {{ $css }}

        <script type="text/javascript">console.log('Welcome to ZatuNikki !!!');</script>
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body id="app">


        <header class="header">
            <div class="header-body">
                <div class="header-info">
                    <p class="header-link">{{ $headerLink }}</p>
                    <p class="header-title">{{ $headerTitle }}</p>
                </div>
                <ul class="header-navlink">{{ $headerNavlink }}</ul>
            </div>
        </header>
        <div class="header-space"></div>



        <main class="main">
            <div class="main-body">
                {{ $slot }}

                <gray-background></gray-background>
                <messanger></messanger>
            </div>
        </main>


    </body>
</html>
