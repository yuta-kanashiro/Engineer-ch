<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        <title>Engineer-ch</title>
    </head>

    <body>
        @include('commons.header')

        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card btn-group-vertical py-3 pl-4">
                        <h3 class="card-title border-bottom mb-3" style="padding:10px;">Menu</h3>
                        @guest
                            <a href="{{ route('login') }}" class="my-2 text-dark border-bottom">みんなの掲示板</a>
                            <a href="{{ route('login') }}" class="my-2 text-dark border-bottom">ともだちの掲示板</a>
                            <a href="{{ route('login') }}" class="my-2 text-dark border-bottom">勉強メモ</a>
                            <a href="{{ route('login') }}" class="my-2 text-dark border-bottom">マイページ</a>
                        @endguest
                        @auth
                            <a href="" class="my-2 text-dark border-bottom">みんなの掲示板</a>
                            <a href="" class="my-2 text-dark border-bottom">ともだちの掲示板</a>
                            <a href="" class="my-2 text-dark border-bottom">勉強メモ</a>
                            <a href="{{ route('user.show', Auth::user()) }}" class="my-2 text-dark border-bottom">マイページ</a>
                        @endauth
                    </div>
                </div>
                <div class="col-md-1 border-left"></div>
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>
        </div>

        <!-- JQuery -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <!-- MDB core JavaScript -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
    </body>
</html>