<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/diary.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="javascript:window.history.back(-1)"><i class="fas fa-long-arrow-alt-left"></i></a>
    </x-slot>

    <x-slot name="headerTitle">
        {!! e($diary->getTitle()) !!}
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




    <div class="diaryshow">
        <div class="diaryshow-body">
            <h2 class="diaryshow-title">
                {!! e($diary->getTitle()) !!}
            </h2>
            <p class="diaryshow-date">
                {{ $diary->date->format('Y/m/d') }}
            </p>
            <p class="diaryshow-content">
                {!! url2aTag(nl2br(e($diary->contents))) !!}
            </p>
        </div>
    </div>
    <diary-show-menu
        auth="{{ $diary->user_id == Auth::id() }}"
        deleteurl="{{ route('diary.delete', ['diary'=>$diary->id]) }}"
        editurl="{{ route('diary.edit', ['diary'=>$diary->id]) }}"
    ></diary-show-menu>

</x-app-layout>
