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
                <img class="card-img-top img-produto" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}">
            </div>

            <div class="col-md-8">
                <div class="descricao">
                    <h1>{{ $produto->nome }}</h1>
                    <h4>Descrição do produto:</h4>
                    <p class="descricao-produto">{{ $produto->descricao }}</p>
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