<x-app-layout>

    <x-slot name="css">
        <link rel="stylesheet" href="{{asset('css/announcement.css')}}">
    </x-slot>




    <x-slot name="headerLink">
        <a href="javascript:window.history.back(-1)"><i class="fas fa-long-arrow-alt-left"></i></a>
    </x-slot>

    <x-slot name="headerTitle">
        reading <i class="fas fa-rss"></i>
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
            @if($book->id)
            <a href="{{ route('book.reading.new', ['book'=>$book]) }}">新しく書く</a>
            @endif
            <div class="list">
                <ul class="list-body">
                    @forelse ($readings as $reading)
                    <li class="list-item">
                        <a href="{{ route('book.reading.show', ['reading'=>$reading['id']]) }}">
                            <span class="list-date">{{ $reading['updated_at'] }}</span>
                            <span class="list-title">{{ $reading['title'] }}</span>
                        </a>
                    </li>
                    @empty
                    <li class="list-empty">
                        <p class="list-empty-message">readingはありません…</p>
                    </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>


</x-app-layout>
