<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/about.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="{{ route('home') }}">ざつにっき</a>
    </x-slot>

    <x-slot name="headerTitle">
    </x-slot>

    <x-slot name="headerNavlink">
        @if(Auth::check())
        <li class="header-navlink-item">
            @include('layouts.menuButton')
        </li>
        @else
        <li class="header-navlink-item"><a class="" href="{{ route('login') }}">ログイン</a></li>
        <li class="header-navlink-item"><a class="marked" href="{{ route('register') }}">はじめる</a></li>
        @endif
    </x-slot>




    <div class="about">
        <div class="about-body">
            <h2 class="about-title">ざつにっきへようこそ！</h2>
            <p class="about-content">
                ここは日記を書く場所です <br>
                いつでもどこでも、すぐに書くことができます <br>
                「日記帳を開くのが面倒だから…」「忙しくて家に帰ってから書く時間がない…」といった理由で日記を書くのをためらっているのなら、ここで書いてみてはどうですか？ <br>
                <br>
                ここで書く日記はあなただけのものですが、知らない誰かにみせることができます <br>
                もちろん誰がかいたのかはわかりません <br>
                たくさんの人が読めば、その感想が巡り巡ってあなたに届くかもしれませんね <br>

            </p>
            <img class="about-img" src="{{ asset("images/logo/open_gray.png") }}" alt="">
            <p class="about-content">
                ここはあなただけの新しい日記帳です <br>
                その日の感想、明日やること、お悩みごと <br>
                日記に書く内容はなんでもかまいません <br>
                さあ、日記をかきましょう！
            </p>
        </div>
    </div>

</x-app-layout>
