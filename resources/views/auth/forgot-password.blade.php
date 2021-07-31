<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="{{ route('home') }}">ざつにっき</a>
    </x-slot>

    <x-slot name="headerTitle"></x-slot>

    <x-slot name="headerNavlink">
        <li class="header-navlink-item"><a class="" href="{{ route('about') }}">ざつにっきとは</a></li>
        <li class="header-navlink-item"><a class="" href="{{ route('login') }}">ログイン</a></li>
        <li class="header-navlink-item"><a class="marked" href="{{ route('register') }}">はじめる</a></li>
    </x-slot>




    <a class="logo" href="/">
        <img src="{{ asset("images/logo/open_white.png") }}" alt="">
    </a>

    <div class="authform">
        <h2 class="authform-head">パスワードをリセットする</h2>

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />


        <form class="authform-body" method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="authform-item">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            </div>

            <button class="authform-button" type="submit" name="button">リセット</button>
        </form>
    </div>
</x-app-layout>
