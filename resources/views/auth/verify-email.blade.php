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
        <li class="header-navlink-item"><a class="marked" href="{{ route('login') }}">ログイン</a></li>
    </x-slot>




    <a class="logo" href="/">
        <img src="{{ asset("images/logo/open_white.png") }}" alt="">
    </a>

    <div class="authform">
        <h2 class="authform-head">ログイン</h2>

        <!-- Session Status -->
        <!-- <x-auth-session-status class="mb-4" :status="session('status')" /> -->

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />

        <form class="authform-body" method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="authform-item">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus>
            </div>

            <!-- Password -->
            <div class="authform-item">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>

            <div class="" style="margin-top: 5px;">
                <a style="color:white;" class="" href="{{ route('password.request') }}">
                    パスワードをお忘れですか？
                </a>
            </div>

            <button class="authform-button" type="submit" name="button">ログイン</button>
        </form>
    </div></x-app-layout>
