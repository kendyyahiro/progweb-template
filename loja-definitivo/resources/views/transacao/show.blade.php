@extends('layouts.app')

@section('content')

<div class="container">
	<h4>Detalhes da Compra - #{{ $transacao_id }}</h4>
	<div class="row">
        @foreach ($produtos_transacao as $transacao)
        <div class="col-md-3">
            <div class="card" style="width: 100%;">
                <a href="{{ route('produto/show', $transacao->produto->id) }}"><img class="produto-anunciado card-img-top" src="{{ asset($transacao->produto->imagens->imagem) }}" alt="{{ $transacao->produto->nome }}"></a>
                <div class="card-body">
                    <h5 class="card-title">{{ $transacao->produto->nome }}</h5>
                    <p class="card-text texto-left">{{ $transacao->produto->descricao }}</p>
                    <p class="card-text texto-left">R${{ number_format($transacao->produto->valor,2,",",".") }}</p>
                </div>

                <div class="card-body">
                    <a href="{{ route('produto/show', $transacao->produto->id) }}" class="btn btn-dark card-link">Ver mais..</a>
                </div>
            </div>
        </div>
        @endforeach
	</div>
</div>


@endsection