<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Loja') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/stylesheet.css') }}" rel="stylesheet">
    <link href="{{ asset('css/cssLaravel.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha256-NuCn4IvuZXdBaFKJOAcsU2Q3ZpwbdFisd5dux4jkQ5w=" crossorigin="anonymous" />
</head>

<body>
    <div id="app">
        <header>
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('img/logo.png') }}" class="img-fluid logo">
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Criar conta') }}</a>
                            </li>
                            @endif
                            @else
                            <li class="nav-item anuncie-aqui">
                                <a href="{{ route('produto/create') }}">Anuncie Aqui</a>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item" href="{{ route('perfil') }}" onclick="event.preventDefault();
                                            document.getElementById('perfil-form').submit();">
                                        {{ __('Perfil') }}
                                    </a>

                                    <form id="perfil-form" action="{{ route('perfil') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @if (Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')
        <div class="menu container-fluid">
            <div class="container-categories-stripe mt-5 mb-4 category-section-margin-bottom">
                <div class="row">
                    <div class="col">
                        <ul class="list-unstyled mb-0 list-inline category-stripe pb-3 category-stripe-margin-bottom">
                            @for($i=1; $i <= 11; $i++) <li class="list-inline-item">
                                <a href="https://ms.olx.com.br/imoveis">
                                    <span class="icon-background">
                                        <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiPz4KPHN2ZyB3aWR0aD0iMjRweCIgaGVpZ2h0PSIyNHB4IiB2aWV3Qm94PSIwIDAgMjQgMjQiIHZlcnNpb249IjEuMSIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB4bWxuczp4bGluaz0iaHR0cDovL3d3dy53My5vcmcvMTk5OS94bGluayI+CiAgICA8IS0tIEdlbmVyYXRvcjogU2tldGNoIDQ4LjIgKDQ3MzI3KSAtIGh0dHA6Ly93d3cuYm9oZW1pYW5jb2RpbmcuY29tL3NrZXRjaCAtLT4KICAgIDx0aXRsZT54eHhoZHBpMDogSWNvbnMgLyBDYXRlZ29yeSAvIEltw7N2ZWlzPC90aXRsZT4KICAgIDxkZXNjPkNyZWF0ZWQgd2l0aCBTa2V0Y2guPC9kZXNjPgogICAgPGRlZnM+CiAgICAgICAgPHBhdGggZD0iTTMuMzQsOS41MiBMMy4zNCwxOS40OCBMMjAuNjYsMTkuNDggTDIwLjY2LDkuNTIgTDMuMzQsOS41MiBaIE0yLjM0LDguNTIgTDIxLjY2LDguNTIgTDIxLjY2LDIwLjQ4IEwyLjM0LDIwLjQ4IEwyLjM0LDguNTIgWiBNMjAuOTA1Njk4Niw0IEwzLjA5NDMwMTQxLDQgTDEuODI1NzI5OTgsOC40NCBMMjIuMTc0MjcsOC40NCBMMjAuOTA1Njk4Niw0IFogTTIuMzQsMyBMMjEuNjYsMyBMMjMuNSw5LjQ0IEwwLjUsOS40NCBMMi4zNCwzIFogTTEwLjk0NTIzNjksMTkuNTQ2ODk2MiBMMTAuOTQ1MjM2OSwxNC4zMTUxNjg4IEMxMC45NDUyMzY5LDEzLjQzNTE4MzggMTAuMTYyMzk3MywxMi43IDkuMTkyOTE4OTgsMTIuNyBDOC4yMjMyODg1MywxMi43IDcuNDQsMTMuNDM1MzM0NyA3LjQ0LDE0LjMxNTE2ODggTDcuNDQsMTkuNTQ2ODk2MiBMMTAuOTQ1MjM2OSwxOS41NDY4OTYyIFogTTYuNDQsMTQuMzE1MTY4OCBDNi40NCwxMi44Njg0MzQgNy42ODQ2MzE4NCwxMS43IDkuMTkyOTE4OTgsMTEuNyBDMTAuNzAxMTMwMywxMS43IDExLjk0NTIzNjksMTIuODY4MzcwOSAxMS45NDUyMzY5LDE0LjMxNTE2ODggTDExLjk0NTIzNjksMjAuNTQ2ODk2MiBMNi40NCwyMC41NDY4OTYyIEw2LjQ0LDE0LjMxNTE2ODggWiBNMTUuMywxNC44OCBMMTYuOTgsMTQuODggTDE2Ljk4LDEzLjIgTDE1LjMsMTMuMiBMMTUuMywxNC44OCBaIE0xNC4zLDEyLjIgTDE3Ljk4LDEyLjIgTDE3Ljk4LDE1Ljg4IEwxNC4zLDE1Ljg4IEwxNC4zLDEyLjIgWiBNMS40MiwyMC41MiBDMS4xNDM4NTc2MywyMC41MiAwLjkyLDIwLjI5NjE0MjQgMC45MiwyMC4wMiBDMC45MiwxOS43NDM4NTc2IDEuMTQzODU3NjMsMTkuNTIgMS40MiwxOS41MiBMMjIuNTgsMTkuNTIgQzIyLjg1NjE0MjQsMTkuNTIgMjMuMDgsMTkuNzQzODU3NiAyMy4wOCwyMC4wMiBDMjMuMDgsMjAuMjk2MTQyNCAyMi44NTYxNDI0LDIwLjUyIDIyLjU4LDIwLjUyIEwxLjQyLDIwLjUyIFoiIGlkPSJwYXRoLTEiPjwvcGF0aD4KICAgIDwvZGVmcz4KICAgIDxnIGlkPSJTeW1ib2xzIiBzdHJva2U9Im5vbmUiIHN0cm9rZS13aWR0aD0iMSIgZmlsbD0ibm9uZSIgZmlsbC1ydWxlPSJldmVub2RkIj4KICAgICAgICA8ZyBpZD0iMDotSWNvbnMtLy1DYXRlZ29yeS0vLUltw7N2ZWlzIj4KICAgICAgICAgICAgPHBhdGggZD0iTTAsMCBMMjQsMCBMMjQsMjQgTDAsMjQgTDAsMCBaIE0wLDAgTDI0LDAgTDI0LDI0IEwwLDI0IEwwLDAgWiBNMCwwIEwyNCwwIEwyNCwyNCBMMCwyNCBMMCwwIFogTTAsMCBMMjQsMCBMMjQsMjQgTDAsMjQgTDAsMCBaIiBpZD0iQ29udGFpbmVyIj48L3BhdGg+CiAgICAgICAgICAgIDxtYXNrIGlkPSJtYXNrLTIiIGZpbGw9IndoaXRlIj4KICAgICAgICAgICAgICAgIDx1c2UgeGxpbms6aHJlZj0iI3BhdGgtMSI+PC91c2U+CiAgICAgICAgICAgIDwvbWFzaz4KICAgICAgICAgICAgPHVzZSBpZD0iTWFzayIgZmlsbD0iIzRBNEE0QSIgZmlsbC1ydWxlPSJub256ZXJvIiB4bGluazpocmVmPSIjcGF0aC0xIj48L3VzZT4KICAgICAgICAgICAgPGcgaWQ9IjA6LUZ1bmRhbWVudGFscy0vLUNvbG9yLS8tUHJpbWFyeS0vLUJsYWNrIiBtYXNrPSJ1cmwoI21hc2stMikiIGZpbGw9IiM0QTRBNEEiPgogICAgICAgICAgICAgICAgPHJlY3QgaWQ9Ik1peGluL0ZpbGwvQmxhY2siIHg9IjAiIHk9IjAiIHdpZHRoPSIyNCIgaGVpZ2h0PSIyNCI+PC9yZWN0PgogICAgICAgICAgICA8L2c+CiAgICAgICAgPC9nPgogICAgPC9nPgo8L3N2Zz4=" alt style="width: 32px; height: 32px;">
                                    </span>
                                    <small>Imóveis</small>
                                </a>
                                </li>
                                @endfor
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>

        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-4 col-xl-5">
                        <div class="links">
                            <a href="{{ route('produto') }}">Produtos</a>
                            <a href="{{ route('produto') }}">Produtos</a>
                            <a href="{{ route('produto') }}">Produtos</a>
                            <a href="{{ route('produto') }}">Produtos</a>
                            <a href="{{ route('produto') }}">Produtos</a>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-2">
                        <img src="{{ asset('img/logo_footer.png') }}" class="img-fluid">
                    </div>
                    <div class="col-md-4 col-xl-5">
                        <div class="midia_social">
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-github" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
</body>

</html>
