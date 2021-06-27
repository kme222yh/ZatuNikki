<nav class="navigation">
    <a class="navigation-item" class="about" href="{{ route('about') }}">ざつにっきとは</a>
    @if(Auth::check())
    <form class="navigation-item logout" method="POST" action="{{ route('logout') }}">
        @csrf
        <a :href="route('logout')"onclick="event.preventDefault();this.closest('form').submit();">ログアウト</a>
    </form>
    @else
    <a class="navigation-item login" href="{{ route('login') }}">ログイン</a>
    <a class="navigation-item register" href="{{ route('register') }}">はじめる</a>
    @endif
</nav>
