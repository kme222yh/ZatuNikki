<menu-button>
    <template v-slot:items>
        <li class="menulink-item"><a href="{{ route('home') }}">トップ <i class="fas fa-home"></i></a></li>
        <li class="menulink-item"><a href="{{ route('diary.new') }}">かく <i class="fas fa-edit"></i></a></li>
        <li class="menulink-item"><a href="{{ route('diary.list') }}">ふりかえる <i class="fas fa-book-open"></i></a></li>
        <!-- <li class="menulink-item"><a href="{{ route('diary.new') }}">さがす <i class="fas fa-search"></i></a></li> -->
        <!-- <li class="menulink-item"><a href="{{ route('diary.new') }}">せってい <i class="fas fa-cog"></i></a></li> -->
        <!-- <li class="menulink-item"><a href="{{ route('diary.new') }}">アカウント <i class="fas fa-user"></i></a></li> -->
        <!-- <li class="menulink-item"><a href="{{ route('diary.new') }}">おしらせ <i class="fas fa-rss"></i></a></li> -->

        <li class="menulink-item bottom">
            <form class="logout" method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="{{ route('logout') }}"onclick="event.preventDefault();this.closest('form').submit();">ログアウト <i class="fas fa-sign-out-alt"></i></a>
            </form>
        </li>
    </template>
</menu-button>
