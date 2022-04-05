<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/diary.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="javascript:window.history.back(-1)"><i class="fas fa-long-arrow-alt-left"></i></a>
    </x-slot>

    <x-slot name="headerTitle">
        本詳細 <i class="fas fa-rss"></i>
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
            <h2 class="diaryshow-title">
                {!! e($book->title) !!}
            </h2>
            <p class="diaryshow-content">
                {!! url2aTag(nl2br(e($book->discription))) !!}
            </p>
        </div>
    </div>
    <diary-show-menu
        auth="{{ true }}"
        deleteurl="{{ route('book.book.delete', ['book'=>$book]) }}"
        editurl="{{ route('book.book.edit', ['book'=>$book]) }}"
    ></diary-show-menu>

</x-app-layout>
