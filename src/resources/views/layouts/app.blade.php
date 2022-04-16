<!DOCTYPE html>
<html lang="ja">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <!-- Font Awesome -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet"/>
        <!-- Google Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
        <!-- Bootstrap core CSS -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
        <!-- Material Design Bootstrap -->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        <!-- カスタマイズ -->
        <link rel="stylesheet" href="{{ secure_asset('css/sidebar.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/user.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/follow_button.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/style.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/responsive.css') }}">
        <link rel="stylesheet" href="{{ secure_asset('css/tabs.css') }}">
        <title>Engineer-ch</title>
    </head>

    <body>
        @include('commons.header')

        <div>
            <div class="row">
                <div class="sidebar">
                    @include('commons.sidebar')
                </div>
                <div class="main-content mb-5">
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
        <!-- font awesome -->
        <!-- <script src="https://kit.fontawesome.com/13d23b6dc7.js" crossorigin="anonymous"></script> -->
        <!-- カスタマイズ -->
        <script src="{{ asset('js/sidebar.js') }}"></script>
        <script src="{{ asset('js/main.js') }}"></script>
    </body>
</html>