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
                        <li><a href="{{ route('login') }}" class="drawer-menu-item text-dark border-bottom">マイページ</a></li>
                        <li><a href="{{ route('register') }}" class="drawer-menu-item text-dark border-bottom">新規登録</a></li>
                        <li><a href="{{ route('login') }}" class="drawer-menu-item text-dark border-bottom">ログイン</a></li>
                        @endguest
                        @auth
                        <li><a href="/" class="drawer-menu-item text-dark border-bottom">みんなの掲示板</a></li>
                        <li><a href="" class="drawer-menu-item text-dark border-bottom">ともだちの掲示板</a></li>
                        <li><a href="" class="drawer-menu-item text-dark border-bottom">勉強メモ</a></li>
                        <li><a href="{{ route('user.show', Auth::user()) }}" class="drawer-menu-item text-dark border-bottom">マイページ</a></li>
                        <li>
                            <form class="mt-2 ml-2" action="{{ route('logout')}}" method="POST" name="logout">
                                @csrf
                                <button class="nav-link rounded-pill bg-light" href="javascript:logout.submit()">ログアウト</button>
                            </form>
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