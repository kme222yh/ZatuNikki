<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/diary.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="javascript:window.history.back(-1)"><i class="fas fa-long-arrow-alt-left"></i></a>
    </x-slot>

    <x-slot name="headerTitle">
        かんそう <i class="fas fa-rss"></i>
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





    <div class="diaryshow">
        <div class="diaryshow-body">
            <p class="diaryshow-content">
                {{ $reading->book->title }}
            </p>
            <h2 class="diaryshow-title">
                {!! e($reading->title) !!}
            </h2>
            <p class="diaryshow-content">
                {!! url2aTag(nl2br(e($reading->contents))) !!}
            </p>
        </div>
    </div>
    <diary-show-menu
        auth="{{ true }}"
        deleteurl="{{ route('book.reading.delete', ['reading'=>$reading]) }}"
        editurl="{{ route('book.reading.edit', ['reading'=>$reading]) }}"
    ></diary-show-menu>

</x-app-layout>
