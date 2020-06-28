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

    <title> Supply & Demand</title>

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
                                <li class="nav-item dropdown d-flex justify-content-center align-items-center">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <img src="{{ asset('img/img_layout/meus_anuncios.png') }}" class="img-anuncio img-fluid">
                                        Meus anúncios
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a href="{{ route('produto/meus-anuncios') }}" class="link-anuncio dropdown-item">Ativos</a>
                                        <a href="{{ route('produto/meus-anuncios-inativos') }}" class="link-anuncio dropdown-item">Inativos</a>
                                    </div>
                                </li>
                                <li class="aplica-hover nav-item d-flex justify-content-center align-items-center">
                                    <a href="{{ route('carrinho-compra') }}" class="link-carrinho">    
                                        <img src="{{ asset('img/img_layout/carrinho.png') }}" class="img-carrinho img-fluid">
                                        Carrinho
                                    </a>
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
                    <button class="btn btn-buscar">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </button>
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

        <footer class="controle-footer">
            <div class="container">
                <div class="row">
                    <div class="col-8 col-md-6 col-xl-8">
                        <div class="row">
                            <div class="espaco-img col-4 col-sm-6 col-md-2 col-xl-2">
                                <img src="{{ asset('img/logo.png') }}" class="img-fluid footer-img">
                            </div>
                            <div class="col-8 col-sm-9 col-md-10 col-xl-9 frase-sensacionalista">
                                Compre no seu tempo e com total segurança.
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-6 col-xl-4">
                        <div class="row">
                            <div class="descricao-footer col-6 col-sm-6 col-md-7 col-xl-8">
                                Programação Web
                                <a class="botao-para-git" href="https://github.com/kendyyahiro/progweb-template" target="_blank">
                                Saiba mais
                                </a>
                            </div>
                            <div class="midia_social col-6 col-sm-6 col-md-5 col-xl-4">
                                <a href="https://www.instagram.com" target="_blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://www.facebook.com" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i></a>
                                <a href="https://www.twitter.com" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                <a href="https://github.com/kendyyahiro/progweb-template" target="_blank"><i class="fa fa-github" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-xl-12">
                        <div class="links">
                            Copyright © 2019-2020 facom.ufms.br LTDA
                        </div>
                        <div class="endereco-fisico">
                            Endereço Rua UFMS, 222-824 - Vila Olinda, Campo Grande - MS, 79050-010
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
<!-- <script src="{{ asset('js/script.js') }}"></script> -->


<script>
    Dropzone.autoDiscover = false;

    $(document).ready(function(){

        /** Slider - Menu de Categorias **/
            $('#slider-categorias').slick({
                infinite: false,
                slidesToShow: 5,
                slidesToScroll: 3,
                responsive: [
                    {
                    breakpoint: 576,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        /** Slider - Menu de Categorias **/

        /** Submeter cadastro/edit do produto **/
        $('#btn-submit-produto').on('click', function(){
            $('#form-produto').submit();
        });

        $("#image-upload").dropzone({
            acceptedFiles : ".png,.jpg,.gif,.bmp,.jpeg",
            dictDefaultMessage: 'Selecione as imagens',
            dictRemoveFile: "Remover Imagem",
            addRemoveLinks: true,
            success: function (file, response) {
                $('#form-produto').append(`<input type="hidden" name="document[]" data-name="${response.original_name}" value="${response.nome}">`)
            },
            removedfile: function (file) {
                file.previewElement.remove();
                var name = '';
                if (typeof file.name !== 'undefined') {
                    name = file.name;
                } else {
                    return;
                }

                /** Remove o input com o nome da imagem para não salvar **/
                $('#form-produto').find('input[name="document[]"][data-name="' + name + '"]').remove();

            },
            init:function(){
                produto_id = $('#image-upload').data('produto-id');
                dropzone = this;
                
                $.ajax({
                    url: `{{ route('produto/buscar-imagens') }}`,
                    type: 'GET',
                    data:{
                        id: produto_id
                    },
                    success: (response) => {
                        $.each(response, function(index, item){
                            url_imagem = item.imagem;
                            name_array = (url_imagem).split('/');
                            name = name_array[name_array.length - 1];

                            /** Adiciona o input dessa imagem no form **/
                            $('#form-produto').append(`<input type="hidden" name="document[]" data-name="${name}" value="${name}">`);

                            let mockFile = { name: name};       
                            dropzone.options.addedfile.call(dropzone, mockFile);
                            dropzone.options.thumbnail.call(dropzone, mockFile, `{{ asset('${url_imagem}') }}`);
                            mockFile.previewElement.classList.add('dz-success');
                            mockFile.previewElement.classList.add('dz-complete');
                        });
                        
                    }
                });
            }
        });

        /** Função para favoritar um produto **/
            $('.produto_anunciado').on('click', function(){
                $(this).find('i').toggleClass('fa-heart-o fa-heart');
                let produto_id = $(this).data('id');

                $.ajax({
                    url:  `{{ route('favoritos/addFavoritos') }}`,
                    type: 'POST',
                    data: {
                        _token: "{{ csrf_token() }}",
                        produto_id: produto_id
                    },
                    success: (response) => {
                        console.log('Sucesso!');
                    },
                    error: () => {
                        sweetToastError('Não foi possível realizar esta ação. Tente novamente!')
                    }
                });
            });
        /** Função para favoritar um produto **/

        /** Slider - Imagem dos Produtos **/
            $('.slider-for').slick({
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                fade: true,
                asNavFor: '.slider-nav'
            });
            $('.slider-nav').slick({
                slidesToShow: 3,
                slidesToScroll: 1,
                asNavFor: '.slider-for',
                dots: true,
                centerMode: false,
                focusOnSelect: true,
                responsive: [
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 1,
                            centerMode: false
                        }
                    },
                ]
            });
        /** Slider - Imagem dos Produtos **/
    });
</script>
