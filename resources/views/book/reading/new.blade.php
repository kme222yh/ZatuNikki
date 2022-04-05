<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/diary.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="javascript:window.history.back(-1)"><i class="fas fa-long-arrow-alt-left"></i></a>
    </x-slot>

    <x-slot name="headerTitle">
        あたらしい感想 <i class="fas fa-rss"></i>
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




    <form action="{{ route('book.reading.new', ['book'=>$book]) }}" method="post" class="editor">
        @csrf
        <div class="editor-body">
            <input class="editor-title" type="text" name="title" placeholder="タイトルなど" required>
            <div class="editor-content">
                <textarea class="editor-content-body" name="contents" placeholder="感想"></textarea>
            </div>
            <button class="editor-submit" type="submit" name="button">保存する</button>
        </div>
    </div>

</x-app-layout>
