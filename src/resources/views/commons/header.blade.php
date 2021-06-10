<header class="mb-5">
    <body class="drawer drawer--left drawer--navbarTopGutter">
        <header class="drawer-navbar drawer-navbar--fixed" role="banner">
            <div class="drawer-container">
                <div class="drawer-navbar-header">
                    <a class="drawer-brand" href="/">Engineer-ch</a>
                    <button type="button" class="drawer-toggle drawer-hamburger">
                        <span class="sr-only">toggle navigation</span>
                        <span class="drawer-hamburger-icon"></span>
                    </button>
                </div>
                <nav class="drawer-nav ml-auto" role="navigation">
                    <ul class="drawer-menu">
                        @guest
                            <li><a href="/" class="drawer-menu-item text-dark border-bottom">みんなの掲示板</a></li>
                            <li><a href="{{ route('login') }}" class="drawer-menu-item text-dark border-bottom">ともだちの掲示板</a></li>
                            <li><a href="{{ route('login') }}" class="drawer-menu-item text-dark border-bottom">勉強メモ</a></li>
                            <li><a href="{{ route('register') }}" class="drawer-menu-item text-dark border-bottom">新規登録</a></li>
                            <li><a href="{{ route('login') }}" class="drawer-menu-item text-dark border-bottom">ログイン</a></li>
                        @endguest
                        @auth
                            <li><a href="/" class="drawer-menu-item text-dark border-bottom">みんなの掲示板</a></li>
                            <li><a href="" class="drawer-menu-item text-dark border-bottom">ともだちの掲示板</a></li>
                            <li><a href="" class="drawer-menu-item text-dark border-bottom">勉強メモ</a></li>
                            <li class="drawer-dropdown">
                                <a class="drawer-menu-item" href="#" data-toggle="dropdown" role="button" aria-expanded="false">{{ Auth::user()->name }}<span class="drawer-caret"></span></a>
                                <ul class="drawer-dropdown-menu dropdown-menu">
                                    <li><a class="drawer-dropdown-menu-item" href="{{ route('user.show', Auth::user()) }}"><small>プロフィール</small></a></li>
                                    <li><a class="drawer-dropdown-menu-item" href="{{ route('edit_infomation', Auth::id()) }}"><small>個人情報の設定</small></a></li>
                                    <li>
                                        <form action="{{ route('logout')}}" method="POST" name="logout">
                                            @csrf
                                            <button class="drawer-dropdown-menu-item clear-decoration" href="javascript:logout.submit()"><small>ログアウト</small></button>
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endauth
                    </ul>
                </nav>
            </div>
        </header>
        <main role="main">
            <!-- Page content -->
        </main>
    </body>
</header>