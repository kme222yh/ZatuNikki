<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/diary.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="javascript:window.history.back(-1)"><i class="fas fa-long-arrow-alt-left"></i></a>
    </x-slot>

    <x-slot name="headerTitle">
        ふりかえる <i class="fas fa-book-open"></i>
    </x-slot>

    <x-slot name="headerNavlink">
        <li class="header-navlink-item"><a class="" href="{{ route('about') }}">ざつにっきとは</a></li>
        @if(Auth::check())
        <li class="header-navlink-item">
            @include('layouts.menuButton')
        </li>
        @else
        <li class="header-navlink-item"><a class="" href="{{ route('login') }}">ログイン</a></li>
        <li class="header-navlink-item"><a class="marked" href="{{ route('register') }}">はじめる</a></li>
        @endif
    </x-slot>




    <my-diary-list api="{{ route('diary.api.list') }}" showurl="{{ url('/diary/show') }}"></my-diary-list>
</x-app-layout>
