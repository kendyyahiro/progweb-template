@extends('layouts.app')

@section('content')

<div class="container">
	<h4>Detalhes da Compra - #{{ $transacao_id }}</h4>
	<div class="row">
        @foreach ($produtos_transacao as $produto)
        <div class="col-md-3">
            <div class="card" style="width: 100%;">
                <a href="{{ route('produto/show', $produto->id) }}"><img class="produto-anunciado card-img-top" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}"></a>
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->nome }}</h5>
                    <p class="card-text">{{ $produto->descricao }}</p>
                    <p class="card-text">R${{ number_format($produto->valor,2,",",".") }}</p>
                </div>

                <div class="card-body">
                    <a href="{{ route('produto/show', $produto->id) }}" class="btn btn-dark card-link">Ver mais..</a>
                </div>
            </div>
        </div>
        @endforeach
	</div>
</div>


@endsection