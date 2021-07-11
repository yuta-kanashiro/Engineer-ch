<input type="checkbox" class="openSidebarMenu" id="openSidebarMenu">

<label for="openSidebarMenu" class="sidebarIconToggle">
    <div class="spinner diagonal part-1"></div>
    <div class="spinner horizontal"></div>
    <div class="spinner diagonal part-2"></div>
</label>

<div id="sidebarMenu" class="sunny-morning-gradient">
    <ul class="sidebarMenuInner">
        @guest
            <li><a href="/" class="text-white">みんなの掲示板</a></li>
            <li><a href="{{ route('login') }}" class="text-white">ともだちの掲示板</a></li>
            <li><a href="{{ route('login') }}" class="text-white">勉強メモ</a></li>
            <li><a href="{{ route('register') }}" class="text-white">新規登録</a></li>
            <li><a href="{{ route('login') }}" class="text-white">ログイン</a></li>
        @endguest
        @auth
            <li><a href="/" class="text-white">みんなの掲示板</a></li>
            <li><a href="" class="text-white">ともだちの掲示板</a></li>
            <li><a href="" class="text-white">勉強メモ</a></li>
            <li class="sidebar-dropdown">
                <a href="#" class="dropdown-toggle text-white">{{ Auth::user()->name }}</a>
                <div class="sidebar-submenu">
                    <ul>
                        <li><a class="sidebar-dropdown-item text-white" href="{{ route('user.show', Auth::user()) }}"><small>プロフィール</small></a></li>
                        <li ><a class="sidebar-dropdown-item text-white" href="{{ route('edit_infomation', Auth::id()) }}"><small>個人情報の設定</small></a></li>
                        <li>
                            <form action="{{ route('logout')}}" method="POST" name="logout">
                                @csrf
                                <button class="text-white clear-decoration" href="javascript:logout.submit()"><small>ログアウト</small></button>
                            </form>
                        </li>
                    </ul>
                </div>
            </li>
        @endauth
    </ul>
</div>