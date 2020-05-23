@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">

        <div class="col-md-6">
            <img class="card-img-top" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}">
        </div>

        <div class="col-md-6">
            <a href="{{ route('carrinho-compra/adicionarCarrinho', $produto->id) }}" class="btn btn-primary">Comprar</a>
        </div>
    
    </div>
</div>


@endsection