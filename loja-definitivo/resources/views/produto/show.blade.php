@extends('layouts.app')

@section('content')

<style>
    .box-btn-comprar{
        width: 100%;
        text-align: right;
    }
</style>

<section id="view-produto">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-4">
                <div class="position-relative">
                    <div class="slider-for">
                        @foreach ($imagens as $imagem)
                            <img class="card-img-top img-produto" src="{{ asset($imagem->imagem) }}">
                        @endforeach
                    </div>
                    <div class="slider-nav <?= count($imagens) > 1 ? "" : "d-none" ?>">
                        @foreach ($imagens as $imagem)
                            <img class="card-img-top img-produto" src="{{ asset($imagem->imagem) }}">
                        @endforeach
                    </div>
                    @auth
                        <button class="produto_anunciado kokoro" data-id="{{ $produto->id }}">
                            <i class="fa {{ !empty($produto->favoritos) ? 'fa-heart' : 'fa-heart-o' }}" aria-hidden="true"></i>
                        </button>
                    @endauth
                </div>
            </div>

            <div class="col-md-8">
                <div class="descricao">
                    <h4>{{ $produto->nome }}</h4>
                    <h4>Descrição do produto:</h4>
                    <p class="descricao-produto">{{ $produto->descricao }}</p>
                    <h4>Categoria:</h4>
                    <p class="descricao-produto">{{ $produto->categoria }}</p>
                    @if ($produto->situacao === 1)
                    <p class="valor-produto">R$ {{ number_format($produto->valor,2,",",".") }}</p>
                    @endif;
                </div>
                @if ($produto->situacao === 1)
                <div class="box-btn-comprar">
                    <a href="{{ route('carrinho-compra/adicionarCarrinho', $produto->id) }}" class="btn btn-primary btn-comprar">Comprar</a>
                </div>
                @else
                    <div class="box-btn-comprar">
                    <p class="btn btn-primary btn-comprar">Produto Indisponível</p>
                    </div>
                @endif;
            </div>
        </div>
    </div>
</section>
@endsection
