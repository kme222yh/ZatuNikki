<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/setting.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="javascript:window.history.back(-1)"><i class="fas fa-long-arrow-alt-left"></i></a>
    </x-slot>

    <x-slot name="headerTitle">
        せってい <i class="fas fa-cog"></i>
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


    <div class="setting">
        <div class="setting-body">
            @include('setting.sidemenu')

            <div class="setting-content">
                <ul class="setting-content-body">
                    <setting-account-delete api="{{ route('delete') }}" csrf="{{ csrf_token() }}" mail_ref="{{ Auth::user()->email }}"></setting-account-delete>
                </ul>
            </div>
        </div>
    </div>


</x-app-layout>
