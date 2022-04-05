<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/about.css')}}">
        <link rel="stylesheet" href="{{asset('css/top.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="{{ route('home') }}">ざつにっき</a>
    </x-slot>

    <x-slot name="headerTitle">
    </x-slot>

    <x-slot name="headerNavlink">
        @if(Auth::check())
        <li class="header-navlink-item">
            @include('book.layouts.menuButton')
        </li>
        @else
        <li class="header-navlink-item"><a class="" href="{{ route('login') }}">ログイン</a></li>
        <li class="header-navlink-item"><a class="marked" href="{{ route('register') }}">はじめる</a></li>
        @endif
    </x-slot>




    <div class="about">
        <div class="about-body">
            <h2 class="about-title">どくしょにっき！！</h2>
            <p class="about-content">
                どくしょにっきです（仮） <br>
            </p>
            <img class="about-img" src="{{ asset("images/logo/open_gray.png") }}" alt="">
        </div>
    </div>

    <div class="diarylist">
        @if(count($recomendations)>0)
        <p class="diarylist-recommendtext"><i class="fas fa-undo-alt"></i> 今日はこの感想を振り返ってみましょう</p>
        <div class="diarylist-body">
            @foreach ($recomendations as $diary)
            <article class="diarylist-item">
                <a href="{{ route('book.reading.show', ['reading' => $diary->id]) }}"></a>
                <h2 class="diarylist-item-title">{!! e($diary->title) !!}</h2>
                <p class="diarylist-item-date">{{ $diary->updated_at }}</p>
                <p class="diarylist-item-contents">{!! nl2br(e($diary->contents)) !!}</p>
            </article>
            @endforeach
        </div>
        @endif
    </div>

</x-app-layout>
