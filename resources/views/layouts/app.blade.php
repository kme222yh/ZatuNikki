<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/reset.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">

        <script type="text/javascript">console.log('Welcome to ZatuNikki !!!');</script>
        <script src="{{ asset('js/app.js') }}" defer></script>

        <title>{{ config('app.name') }}</title>
    </head>
    <body>
        <header>
            <h1 class="app-title">
                <a href="/">ざつにっき</a>
            </h1>
            @include('layouts.nav')
        </header>




        <main id="app">
            @if(Auth::check())
            @include('layouts.sidenav')
            @endif

            <div class="content">
                <div class="content-body">
                    {{ $slot }}
                </div>
            </div>

        </main>
        

    </body>
</html>
