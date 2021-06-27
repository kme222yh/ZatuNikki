<x-guest-layout>

    <x-slot name="nav">
        <a class="navigation-item register" href="{{ route('register') }}">あたらしくはじめる</a>
    </x-slot>

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

            <!-- Remember Me -->
            <!-- <div class="block mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div> -->

            <div class="" style="margin-top: 5px;">
                <a style="color:white;" class="" href="{{ route('password.request') }}">
                    パスワードをお忘れですか？
                </a>
            </div>

            <button class="authform-button" type="submit" name="button">ログイン</button>
        </form>
    </div>
</x-guest-layout>
