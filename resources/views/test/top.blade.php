<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="{{asset('css/reset.css')}}">
        <link rel="stylesheet" href="{{asset('css/test.css')}}">

        <title>{{ config('app.name') }}</title>
    </head>
    <body>

        <header>
            <h1 class="app-title">ざつにっき</h1>
            <div class="account-menu">
                <a class="login" href="/login">ログイン</a>
                <a class="register" href="/register">はじめる</a>
            </div>
        </header>




        <main>

            <nav class="sidemenu">
                <ul class="sidemenu-body">
                    <a class="sidemenu-item" href="/write">書く</a>
                    <a class="sidemenu-item" href="/">ふりかえる</a>
                    <a class="sidemenu-item" href="/">さがす</a>
                </ul>
            </nav>

            <div class="content">
                <div class="content-body">
                    <div class="otherarticles">
                        <div class="otherarticles-body">
                            @for ($i = 0; $i < 7; $i++)
                            <article class="otherarticles-row">
                                @for ($j = 0; $j < 3; $j++)
                                <article class="otherarticles-item">
                                    <a href="/article"></a>
                                </article>
                                @endfor
                            </article>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>

        </main>




        <footer>

        </footer>

    </body>
</html>
