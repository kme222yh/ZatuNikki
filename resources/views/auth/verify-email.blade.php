<!-- <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ __('A new verification link has been sent to the email address you provided during registration.') }}
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button>
                        {{ __('Resend Verification Email') }}
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __('Log Out') }}
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout> -->


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

            <div class="" style="margin-top: 5px;">
                <a style="color:white;" class="" href="{{ route('password.request') }}">
                    パスワードをお忘れですか？
                </a>
            </div>

            <button class="authform-button" type="submit" name="button">ログイン</button>
        </form>
    </div>
</x-guest-layout>
