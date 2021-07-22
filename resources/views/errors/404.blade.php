<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/error.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="{{ route('home') }}">ざつにっき</a>
    </x-slot>

    <x-slot name="headerTitle">

    </x-slot>

    <x-slot name="headerNavlink">
        <li class="header-navlink-item"><a class="" href="{{ route('about') }}">ざつにっきとは</a></li>
        @if(Auth::check())
        <li class="header-navlink-item">
            @include('layouts.menuButton')
        </li>
        @else
        <li class="header-navlink-item"><a class="" href="{{ route('login') }}">ログイン</a></li>
        <li class="header-navlink-item"><a class="marked" href="{{ route('register') }}">はじめる</a></li>
        @endif
    </x-slot>


    <div class="error">
        <div class="error-body">
            <p class="error-title">404 Not Found</p>
            <p class="error-message">コンテンツがみつかりませんでした</p>
        </div>
    </div>

    <a class="logo" href="/">
        <img src="{{ asset("images/logo/close_white.png") }}" alt="">
    </a>
</x-app-layout>
