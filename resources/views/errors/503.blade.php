<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/error.css')}}">
    </x-slot>




    <x-slot name="headerLink">
    </x-slot>

    <x-slot name="headerTitle">
    </x-slot>

    <x-slot name="headerNavlink">
    </x-slot>


    <div class="error">
        <div class="error-body">
            <p class="error-title">503</p>
            <p class="error-message">サーバーメンテナンス中です</p>
        </div>
    </div>

    <img class="logo" src="{{ asset("images/logo/close_white.png") }}" alt="">
</x-app-layout>
