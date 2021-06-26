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
            <h1 class="app-title">
                <a href="/">ざつにっき</a>
            </h1>
            <div class="account-menu">
                <a class="about" href="/about">ざつにっきとは</a>
                <a class="login" href="/login">ログイン</a>
                <a class="register" href="/register">はじめる</a>
            </div>
        </header>




        <main>

            <nav class="sidemenu">
                <ul class="sidemenu-body">
                    <li><a class="sidemenu-item current" href="/write">書く</a></li>
                    <li><a class="sidemenu-item" href="/list">ふりかえる</a></li>
                    <li><a class="sidemenu-item" href="/search">さがす</a></li>
                </ul>
            </nav>

            <div class="content">
                <div class="content-body">
                    <div class="articlelist">
                        <div class="articlelist-body">
                            @for ($i = 0; $i < 3; $i++)
                            <div class="articlelist-year">
                                <span class="articlelist-year-head">2021年</span>
                                <ul class="articlelist-year-body">
                                    @for ($j = 0; $j < 5; $j++)
                                    <li class="articlelist-month">
                                        <span class="articlelist-month-head">5月</span>
                                        <ul class="articlelist-month-body">
                                            @for ($a = 0; $a < 6; $a++)
                                            <li class="articlelist-date">
                                                <a class="articlelist-date-body" href="/article">
                                                    <span class="articlelist-date-head">4日</span>
                                                    <span class="articlelist-date-title">タイトルタイトルタイトルタイトルタイトルタイトル</span>
                                                </a>
                                            </li>
                                            @endfor
                                        </ul>
                                    </li>
                                    @endfor
                                </ul>
                            </div>
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
