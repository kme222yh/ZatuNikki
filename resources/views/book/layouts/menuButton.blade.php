<menu-button>
    <template v-slot:items>
        <li class="menulink-item"><a href="{{ route('book.top') }}">トップ <i class="fas fa-home"></i></a></li>
        <li class="menulink-item"><a href="{{ route('book.book.new') }}">あたらしいほん <i class="fa-solid fa-book-open"></i></a></li>
        <li class="menulink-item"><a href="{{ route('book.book.list') }}">よんだほん <i class="fa-solid fa-book"></i></a></li>
        <li class="menulink-item"><a href="{{ route('book.reading.list') }}">ふりかえる <i class="fa-solid fa-bookmark"></i></a></li>

        <li class="menulink-item bottom">
            <form class="logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"onclick="event.preventDefault();this.closest('form').submit();">ログアウト <i class="fas fa-sign-out-alt"></i></a>
            </form>
        </li>
    </template>
</menu-button>
