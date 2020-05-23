@extends('layouts.app')

@section('content')

<section id="view-produto">
    <div class="container">
        <div class="row">

            <div class="col-md-4">
                <img class="card-img-top img-produto" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}">
            </div>

            <div class="col-md-8">
                <div class="descricao">
                    <h2>{{ $produto->nome }}</h2>
                    <p class="descricao-produto">{{ $produto->descricao }}</p>
                    <p class="valor-produto">R$ {{ number_format($produto->valor,2,",",".") }}</p>
                </div>
                <a href="{{ route('carrinho-compra/adicionarCarrinho', $produto->id) }}" class="btn btn-primary btn-comprar">Comprar</a>
            </div>
        
        </div>
    </div>
</section>


@endsection