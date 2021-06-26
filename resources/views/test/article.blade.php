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

            <!-- <nav class="sidemenu">
                <ul class="sidemenu-body">
                    <a class="sidemenu-item" href="/write">書く</a>
                    <a class="sidemenu-item" href="/">ふりかえる</a>
                    <a class="sidemenu-item" href="/">さがす</a>
                </ul>
            </nav> -->

            <div class="content">
                <div class="content-body">
                    <div class="articledetail">
                        <div class="articledetail-body">
                            <h2 class="articledetail-title">
                                今日はこんなことがありました。
                            </h2>
                            <span class="articledetail-date">
                                2021/12/12
                            </span>
                            <p class="articledetail-content">
                                これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
テキストテストテキストですねぇこれはテキストテストテキストですねぇこれはテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
テキストテストテキストですねぇこれはテキストテストテキストですねぇこれはテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇこれはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ テキストテストテキストですねぇこれはテキストテストテキストですねぇこれはテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ テキストテストテキストですねぇこれはテキストテストテキストですねぇこれはテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ これはテキストテストテキストですねぇこれはテキストテストテキストですねぇテキストテストテキストですねぇ
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </main>




        <footer>

        </footer>

    </body>
</html>
