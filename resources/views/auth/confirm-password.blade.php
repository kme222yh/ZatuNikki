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
        <h2 class="authform-head">パスワードを確認</h2>

        <div class="message">
            {{ __('This is a secure area of the application. Please confirm your password before continuing.') }}
        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />

        <form class="authform-body" method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="authform-item">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>

            <button class="authform-button" type="submit" name="button">確認</button>
        </form>
    </div>
</x-app-layout>
