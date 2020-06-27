@extends('layouts.app')

@section('content')

<style>
    .box-btn-comprar{
        width: 100%;
        text-align: right;
    }
</style>

<section id="view-produto">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="slider-for">
                            @foreach ($imagens as $imagem)
                                <img class="card-img-top img-produto" src="{{ asset($imagem->imagem) }}">
                            @endforeach
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="slider-nav">
                            @foreach ($imagens as $imagem)
                                <img class="card-img-top img-produto" src="{{ asset($imagem->imagem) }}">
                            @endforeach
                        </div>
                    </div>
                </div>
                @auth
                    <button class="produto_anunciado kokoro" data-id="{{ $produto->id }}">
                        <i class="fa {{ !empty($produto->favoritos) ? 'fa-heart' : 'fa-heart-o' }}" aria-hidden="true"></i>
                    </button>
                @endauth
            </div>

            <div class="col-md-8">
                <div class="descricao">
                    <h1>{{ $produto->nome }}</h1>
                    <h4>Descrição do produto:</h4>
                    <p class="descricao-produto">{{ $produto->descricao }}</p>
                    <h4>Categoria:</h4>
                    <p class="descricao-produto">{{ $produto->categoria }}</p>
                    <p class="valor-produto">R$ {{ number_format($produto->valor,2,",",".") }}</p>
                </div>
                <div class="box-btn-comprar">
                    <a href="{{ route('carrinho-compra/adicionarCarrinho', $produto->id) }}" class="btn btn-primary btn-comprar">Comprar</a>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
