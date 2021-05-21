<header class="mb-5">
    <nav class="navbar navbar-expand-sm tempting-azure-gradient navbar-dark">

        <a class="navbar-brand" style="font-size:2rem;" href="/">Engineer-ch</a>

        <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
            <div class="navbar-nav">
                @guest
                    <a class="nav-item nav-link text-white" href="{{ route('register') }}">新規登録</a>
                    <a class="nav-item nav-link text-white" href="{{ route('login') }}">ログイン</a>
                @endguest

                @auth
                    <a class="nav-item nav-link text-white" href="">掲示板に投稿する</a>
                @endauth
            </div>
        </div>
    </nav>
</header>