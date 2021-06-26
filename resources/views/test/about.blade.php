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
                    <li><a class="sidemenu-item current" href="/write">書く</a></li>
                    <li><a class="sidemenu-item" href="/">ふりかえる</a></li>
                    <li><a class="sidemenu-item" href="/">さがす</a></li>
                </ul>
            </nav> -->

            <div class="content">
                <div class="content-body">
                    <div class="about">
                        <div class="about-body">
                            <h2 class="about-title">ざつにっきへようこそ！</h2>
                            <p class="about-content">
                                ここは匿名で日記を書ける場所です。 <br>
                                日記の内容を秘密にしたいのであれば、 <br>
                                誰もあなたの日記を読むことはできません。 <br>
                                 <br>
                                もしあなたの日記を誰かに読んで欲しくなった時、 <br>
                                知らない誰かに向けて公開することができます。 <br>
                                もちろん、書いているのがあなただとは誰にもわかりません。 <br>
                                 <br>
                                書くだけではなく、他の誰かの日記を覗いてみるのもいいでしょう。 <br>
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
