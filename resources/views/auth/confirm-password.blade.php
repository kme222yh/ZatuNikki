<x-guest-layout>

    <x-slot name="nav">
        <a class="navigation-item register" href="{{ route('register') }}">あたらしくはじめる</a>
    </x-slot>

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
</x-guest-layout>
