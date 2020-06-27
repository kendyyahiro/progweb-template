<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<?php
$produto = \App\Produto::all();
?>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Loja') }}</title>

    <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}"/>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.min.css" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
                                <li class="nav-item d-flex justify-content-center align-items-center">
                                    <div class="img-anuncio">
                                        <img src="{{ asset('img/img_layout/meus_anuncios.png') }}" class="img-fluid">
                                    </div>
                                    <a href="{{ route('produto/meus-anuncios') }}" class="link-anuncio">Meus anúncios</a>
                                </li>
                                <li class="nav-item d-flex justify-content-center align-items-center">
                                    <div class="img-carrinho">
                                        <img src="{{ asset('img/img_layout/carrinho.png') }}" class="img-fluid">
                                    </div>
                                    <a href="{{ route('carrinho-compra') }}" class="link-carrinho">Carrinho</a>
                                </li>
                                <li class="nav-item">
                                    <div class="anuncie-aqui">
                                        <a href="{{ route('produto/create') }}">Anuncie Aqui</a>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} 
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('perfil') }}">
                                            {{ __('Perfil') }}
                                        </a>

                                        <a href="{{ route('transacao/minhas-compras') }}" class="link-anuncio dropdown-item">Minhas Compras</a>

                                        <a href="{{ route('favoritos') }}" class="link-anuncio dropdown-item">Favoritos</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        @if (Route::currentRouteName() != 'login' && Route::currentRouteName() != 'register')

        <section class="menu categorias">
            <div class="container">
                <form action="{{route('busca')}}" class="position-relative">
                    <input class="form-control col-12 px-md-4 mb-4" placeholder="Buscar..." type="text" name="texto" value="{{ isset($busca['texto'])  ? $busca['texto'] : '' }}">
                    <button class="btn btn-info btn-buscar">Buscar</button>
                </form>
                <div id="slider-categorias">
                        <div class="category-stripe text-center">
                            <a href="{{ route('produto/categoria', $produto->categoria='Imóveis') }}">
                                <span class="icon-background">
                                    <img src="{{ asset('img/img_menu_categoria/Imoveis.jpg') }}" alt style="width: 32px; height: 32px;">
                                </span>
                                <small>Imóveis</small>
                            </a>
                        </div>
                        <div class="category-stripe text-center">
                            <a href="{{ route('produto/categoria', $produto->categoria='Auto e peças') }}">
                                <span class="icon-background">
                                    <img src="{{ asset('img/img_menu_categoria/Auto-peça.png') }}" alt style="width: 32px; height: 32px;">
                                </span>
                                <small>Auto e peças</small>
                            </a>

                        </div>
                    <div class="category-stripe text-center">
                        <a href="{{ route('produto/categoria', $produto->categoria='Para casa') }}">
                                <span class="icon-background">
                                    <img src="{{ asset('img/img_menu_categoria/Para_casa.png') }}" alt style="width: 32px; height: 32px;">
                                </span>
                            <small>Para casa</small>
                        </a>

                    </div>
                    <div class="category-stripe text-center">
                        <a href="{{ route('produto/categoria', $produto->categoria='Eletrônicos e celulares') }}">
                                <span class="icon-background">
                                    <img src="{{ asset('img/img_menu_categoria/eletronicos.png') }}" alt style="width: 32px; height: 32px;">
                                </span>
                            <small>Eletrônicos e celulares</small>
                        </a>

                    </div>
                    <div class="category-stripe text-center">
                        <a href="{{ route('produto/categoria', $produto->categoria='Artigos infantis') }}">
                                <span class="icon-background">
                                    <img src="{{ asset('img/img_menu_categoria/infantil.png') }}" alt style="width: 32px; height: 32px;">
                                </span>
                            <small>Artigos infantis</small>
                        </a>

                    </div>
                    <div class="category-stripe text-center">
                        <a href="{{ route('produto/categoria', $produto->categoria='Serviços') }}">
                                <span class="icon-background">
                                    <img src="{{ asset('img/img_menu_categoria/serviços.png') }}" alt style="width: 32px; height: 32px;">
                                </span>
                            <small>Serviços</small>
                        </a>

                    </div>
                    <div class="category-stripe text-center">
                        <a href="{{ route('produto/categoria', $produto->categoria='Esporte e lazer') }}">
                                <span class="icon-background">
                                    <img src="{{ asset('img/img_menu_categoria/esporte.png') }}" alt style="width: 32px; height: 32px;">
                                </span>
                            <small>Esporte e lazer</small>
                        </a>

                    </div>
                    <div class="category-stripe text-center">
                        <a href="{{ route('produto/categoria', $produto->categoria='Moda e beleza') }}">
                                <span class="icon-background">
                                <img src="{{ asset('img/img_menu_categoria/moda_beleza.jpg') }}" alt style="width: 32px; height: 32px;">
                                </span>
                            <small>Moda e beleza</small>
                        </a>

                    </div>
                    <div class="category-stripe text-center">
                        <a href="{{ route('produto/categoria', $produto->categoria='Animais de estimação') }}">
                                <span class="icon-background">
                                    <img src="{{ asset('img/img_menu_categoria/animais.jpg') }}" alt style="width: 32px; height: 32px;">
                                </span>
                            <small>Animais de estimação</small>
                        </a>

                    </div>
                    <div class="category-stripe text-center">
                        <a href="{{ route('produto/categoria', $produto->categoria='Outros') }}">
                                <span class="icon-background">
                                    <img src="{{ asset('img/img_menu_categoria/Outros.png') }}" alt style="width: 32px; height: 32px;">
                                </span>
                            <small>Outros</small>
                        </a>

                    </div>

                </div>

                

            </div>
        </section>
        @endif

        <main class="py-3">
            @yield('content')
        </main>

        <footer>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-md-4 col-xl-5">
                        <div class="links">
                            <a href="{{ route('produto') }}">Produtos</a>
                            <a href="{{ route('produto') }}">Produtos</a>
                            <a href="{{ route('produto') }}">Produtos</a>
                            <a href="{{ route('produto') }}">Produtos</a>
                            <a href="{{ route('produto') }}">Produtos</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-4 col-xl-2">
                        <img src="{{ asset('img/logo_footer.png') }}" class="img-fluid">
                    </div>
                    <div class="col-12 col-md-4 col-xl-5">
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
</body>

</html>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/dropzone.min.js"></script>
<script src="{{ asset('js/script.js') }}"></script>
