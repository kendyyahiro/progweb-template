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

         
        <nav class="navbar navbar-expand-lg text-white">
            <a href="#" class="navbar-brand">Oferta e Procura</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div id="menu" class="collapse navbar-collapse sticky-top">
                <!-- <div class="top-right links"> -->
                    @if (Route::has('login'))
                    <ul class="navbar-nav ml-md-auto">
                        @auth
                        <button type="submit">&#128269;</button>
                        <li class="nav-item active navbar-dark">
                            <a class="nav-link" href="{{ url('/home') }}">Home</a>
                        </li>
                        @else
                        <li class="nav-item active navbar-dark">
                            <a class="nav-link"href="#">Meus Anúncios</a>
                        </li>
                        <li class="nav-item active navbar-dark"> 
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>                        
                        <li class="nav-item active navbar-dark">    
                            @if (Route::has('register'))
                            <a class="nav-link" href="{{ route('register') }}">Register</a>
                            @endif
                        </li>
                        <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Anuncie aqui</a>                        <!-- <a href="#" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Primary link</a>                        @endauth -->

                        <!-- <form class="form-inline input-group">
                            <input type="text" placeholder="Meus Anuncios" name="meus-anuncios" class="form-control">
                            <input type="submit" class="btn-success">
                        </form> -->
                    </ul>
                    <!-- </div>  -->
            </div>
            @endif
        </nav>
        <div class="jumbotron text-center">
        <h1>My First Bootstrap Page</h1>
        <p>Resize this responsive page to see the effect!</p> 
        </div>
        
        <p><h4>Anúncios Recentes</h4></p>
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-2">
                    <h4>Column 1</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-2">
                    <h4>Column 2</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-2">
                    <h4>Column 3</h4>        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-2">
                    <h4>Column 4</h4>        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-2">
                    <h4>Column 5</h4>        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-2">
                    <h4>Column 6</h4>        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                
                <div class="col-sm-2">
                    <h4>Column 1</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-2">
                    <h4>Column 2</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-2">
                    <h3>Column 3</h3>        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-2">
                    <h4>Column 4</h4>        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-2">
                    <h4>Column 5</h4>        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
                <div class="col-sm-2">
                    <h4>Column 6</h4>        
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                    <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                </div>
            </div>  
        </div  class="space margin -bottom"> 
        <!-- Deixar AQUI específico para 3 anúncios pré-programados para 3 tipos de produtos. -->
        <div>
            <div class="especific-container-fluid text-center">
                <div class="row">
                    <div class="col-sm-4">
                            <h4>Anuncio Dedicado 1</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                        </div>
                        <div class="col-sm-4">
                            <h4>Anuncio Dedicado 2</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                        </div>
                        <div class="col-sm-4">
                            <h4>Anuncio Dedicado 3</h4>        
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
                            <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
                        </div>
                    </div> 
                </div>
            </div>
        </div>

            <div class=""></div>
                <div class="content">
                    <div class="title m-b-md">
                        <!-- Laravel2 -->
                    </div>
                </div>
            </div>

    </head>
    <body>

        @yield('conteudo')
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    </body>
</html>
