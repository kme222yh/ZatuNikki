<x-guest-layout>
    <x-slot name="nav">
        <a class="navigation-item login" href="{{ route('login') }}">登録済みの方はこちら</a>
    </x-slot>

    <div class="authform">
        <h2 class="authform-head">新しくはじめる</h2>

        <!-- Validation Errors -->
        <x-auth-validation-errors :errors="$errors" />


        <form class="authform-body" method="POST" action="{{ route('register') }}">
            @csrf

            <!-- User Name -->
            <div class="authform-item">
                <label for="name">ユーザー名</label>
                <input id="name" type="text" name="name" :value="old('name')" required autofocus>
            </div>

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

            <!-- Password -->
            <div class="authform-item">
                <label for="password_confirmation">パスワード（確認用）</label>
                <input id="paspassword_confirmationsword" type="password" name="password_confirmation" required>
            </div>


            <button class="authform-button" type="submit" name="button">登録</button>
        </form>
    </div>
</x-guest-layout>
