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
                さあ、日記をかきましょう！
            </p>
            <img class="about-img" src="{{ asset("images/logo/open_gray.png") }}" alt="">

            @if(Auth::check())
            <a href="{{ route('diary.new') }}" class="authform-button" >にっきをかく</a>
            @endif
        </div>
    </div>

</x-app-layout>
