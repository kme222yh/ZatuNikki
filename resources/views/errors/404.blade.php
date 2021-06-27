<x-guest-layout>

    <x-slot name="nav">
        <a class="navigation-item register" href="{{ route('register') }}">あたらしくはじめる</a>
    </x-slot>

    <div class="error">
        <div class="error-body">
            <p class="error-message">404 Not Found <br> コンテンツがみつかりませんでした</p>
        </div>
    </div>
</x-guest-layout>
