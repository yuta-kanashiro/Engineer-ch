<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">

<label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
</label>

<div id="sidebarMenu" class="sunny-morning-gradient">
    <ul class="sidebarMenuInner">
        @guest
            <li><a href="/" class="text-white"><i class="far fa-clipboard fa-lg mr-3"></i>掲示板一覧</a></li>
            <li><a href="{{ route('login') }}" class="text-white"><i class="fas fa-clipboard fa-lg mr-3"></i>タイムライン</a></li>
            <li><a href="{{ route('login') }}" class="text-white"><i class="fas fa-pen" style="padding-right:17px;"></i>勉強メモ</a></li>
            <li><a href="{{ route('login') }}" class="text-white"><i class="fas fa-search fa-lg" style="padding-right:12px;"></i>検索</a></li>
            <li><a href="{{ route('login') }}" class="text-white"><i class="far fa-user fa-lg" style="padding-right:14px;"></i>ログイン</a></li>
        @endguest
        @auth
            <li><a href="/" class="text-white"><i class="far fa-clipboard fa-lg mr-3"></i>掲示板一覧</a></li>
            <li><a href="{{ route('showTimeline') }}" class="text-white"><i class="fas fa-clipboard fa-lg mr-3"></i>タイムライン</a></li>
            <li><a href="" class="text-white"><i class="fas fa-pen" style="padding-right:17px;"></i>勉強メモ</a></li>
            <li><a href="{{ route('search') }}" class="text-white"><i class="fas fa-search fa-lg" style="padding-right:12px;"></i>検索</a></li>
            <li class="sidebar-dropdown">
                <a class="dropdown-toggle text-white pl-2">
                    @if (Auth::user()->profile_image === null)
                        <img class="profile-icon rounded-circle ml-1" src="{{ asset('default.png') }}" alt="プロフィール画像" width="28" height="28">
                    @else
                        <img class="profile-icon rounded-circle ml-1" src="{{ Storage::url(Auth::user()->profile_image) }}" alt="プロフィール画像" width="28" height="28">
                    @endif
                    <span class="ml-2">{{ Auth::user()->name }}</span>
                </a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a class="sidebar-dropdown-item text-white" href="{{ route('user.show', Auth::user()) }}"><small>プロフィール</small></a></li>
                        <li ><a class="sidebar-dropdown-item text-white" href="{{ route('edit_infomation', Auth::id()) }}"><small>個人情報の設定</small></a></li>
                        <li>
                            <form action="{{ route('logout')}}" method="POST" name="logout">
                                @csrf
                                <input type="submit" value="ログアウト" class="logout-btn text-white small">
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        @endauth
    </ul>
</div>