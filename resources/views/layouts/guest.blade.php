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
    <body class="guest">
        <header>
            <nav class="navigation">
                <a class="navigation-item" class="about" href="{{ route('about') }}">ざつにっきとは</a>
                {{ $nav }}
            </nav>
        </header>




        <main>

            <div class="mainvisual">
                <div class="mainvisual-body">
                    <h1>
                        <a href="{{route('home')}}">ざつにっき</a>
                    </h1>
                </div>
            </div>

            <div class="content">
                <div class="content-body">
                    {{ $slot }}
                </div>
            </div>

        </main>




        <footer>

        </footer>

    </body>
</html>
