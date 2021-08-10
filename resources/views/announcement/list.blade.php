<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/announcement.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="javascript:window.history.back(-1)"><i class="fas fa-long-arrow-alt-left"></i></a>
    </x-slot>

    <x-slot name="headerTitle">
        おしらせ <i class="fas fa-rss"></i>
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


    <announcement-list api="{{ route('announcement.api.list') }}" showurl="{{ url('/announcement/show') }}"></announcement-list>


</x-app-layout>
