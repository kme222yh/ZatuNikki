<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/announcement.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="javascript:window.history.back(-1)"><i class="fas fa-long-arrow-alt-left"></i></a>
    </x-slot>

    <x-slot name="headerTitle">
        読んだ本 <i class="fas fa-rss"></i>
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



    <div class="announcementlist">
        <div class="announcementlist-body">
            <div class="list">
                <ul class="list-body">
                    @forelse ($books as $book)
                    <li class="list-item">
                        <a href="{{ route('book.book.show', ['book'=>$book]) }}" class="list-date">詳細</a>
                        <a href="{{ route('book.reading.list', ['book'=>$book]) }}">
                            <span class="list-title">{{ $book->title }}</span>
                        </a>
                    </li>
                    @empty
                    <li class="list-empty">
                        <p class="list-empty-message">本はありません…</p>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>


</x-app-layout>
