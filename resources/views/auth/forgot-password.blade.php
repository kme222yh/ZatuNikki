<x-guest-layout>
    <x-slot name="nav">
        <a class="navigation-item login" href="{{ route('login') }}">登録済みの方はこちら</a>
    </x-slot>

    <div class="authform">
        <h2 class="authform-head">パスワードをリセットする</h2>

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />


        <form class="authform-body" method="POST" action="{{ route('password.email') }}">
            @csrf

            <!-- Email Address -->
            <div class="authform-item">
                <label for="email">メールアドレス</label>
                <input id="email" type="email" name="email" :value="old('email')" required autofocus>
            </div>

            <button class="authform-button" type="submit" name="button">リセット</button>
        </form>
    </div>
</x-guest-layout>
