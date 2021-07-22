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
        <li class="header-navlink-item"><a class="marked" href="{{ route('login') }}">はじめる</a></li>
    </x-slot>




    <a class="logo" href="/">
        <img src="{{ asset("images/logo/open_white.png") }}" alt="">
    </a>

    <div class="authform">
        <h2 class="authform-head">パスワードをリセットする</h2>

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />


        <form class="authform-body" method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="authform-item">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" value="{{old('email', $request->email)}}" required autofocus>
            </div>

            <!-- Password -->
            <div class="authform-item">
                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" required autocomplete="current-password">
            </div>

            <!-- Confirm Password -->
            <div class="authform-item">
                <label for="password_confirmation">パスワード（確認用）</label>
                <input id="paspassword_confirmationsword" type="password" name="password_confirmation" required>
            </div>

            <button class="authform-button" type="submit" name="button">リセット</button>
        </form>
    </div>
</x-app-layout>
