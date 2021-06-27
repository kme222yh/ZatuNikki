@if(Auth::check())
<nav class="sidemenu">
    <ul class="sidemenu-body">
        <li><a class="sidemenu-item current" href="{{ route('write.new') }}">書く</a></li>
        <li><a class="sidemenu-item" href="{{ route('view.list') }}">ふりかえる</a></li>
        <!-- <li><a class="sidemenu-item" href="/search">さがす</a></li> -->
    </ul>
</nav>
@endif
