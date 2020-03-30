<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="./css/stylesheet.css">
    <link rel="stylesheet" type="text/css" href="./css/cssLaravel.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

</head>

<body>
    <nav class="navbar navbar-expand-lg text-white">
        <a href="#" class="navbar-brand">Oferta e Procura</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
            <span class="navbar-toggler-icon"></span>
        </button>
<!-- QUANDO ESTOU LOGADO, DA ERRO AO VOLTAR PARA PUBLIC/ -->
        <div id="menu" class="collapse navbar-collapse sticky-top">
            <!-- <div class="top-right links"> -->
                @if (Route::has('login'))
                <ul class="navbar-nav ml-md-auto">
                    @auth
                    <button type="submit">&#128269;</button>
                    <li class="nav-item navbar-dark">
                        <a class="nav-link" href="{{ route('site.home') }}">Home</a>
                    </li>
                    @else
                    <li class="nav-item {{ (Route::current()->getName() === 'site.my-requests' ? 'active': '') }}">
                        <a class="nav-link"href="{{ route('site.my-requests') }}">Meus Anúncios</a>
                    </li>
                    <li class="nav-item {{ (Route::current()->getName() === 'login' ? 'active': '') }}">
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item {{ (Route::current()->getName() === 'register' ? 'active': '') }}">
                        @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                        @endif
                    </li>
                    <a href="{{ route('site.advertise-here') }}" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Anuncie aqui</a>
                    @endauth


                    </ul>
                    @endif
                </div>
            </nav>
            <div class="jumbotron text-center">
                <h1 class="text-white"><strong>Minha loja</strong></h1>
            </div>

            @yield('conteudo')

            <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        </body>
        </html>
