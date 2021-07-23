<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/error.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="{{ route('home') }}">ざつにっき</a>
    </x-slot>

    <x-slot name="headerTitle">

    </x-slot>

    <x-slot name="headerNavlink">
        
    </x-slot>


    <div class="error">
        <div class="error-body">
            <p class="error-title">404 Not Found</p>
            <p class="error-message">コンテンツがみつかりませんでした</p>
        </div>
    </div>

    <a class="logo" href="/">
        <img src="{{ asset("images/logo/close_white.png") }}" alt="">
    </a>
</x-app-layout>
