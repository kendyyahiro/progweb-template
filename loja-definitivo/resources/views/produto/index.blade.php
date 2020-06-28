@extends('layouts.app')

@section('content')

<div class="container py-3">

    @if(count($produtos) != 0)
        @if($produtos[0]->situacao ===1)
            <h4>Meus anúncios ativos</h4>
        @else
            <h4>Meus anúncios inativos</h4>
        @endif
    @endif
	<div class="row">
		@if(count($produtos) != 0)
			@foreach ($produtos as $produto)
			<div class="col-12 col-sm-6 col-lg-4 pb-3">
				<div class="card" style="width: 100%;">
					<a href="{{ route('produto/show', $produto->id) }}"><img class="produto-anunciado card-img-top" src="{{ asset($produto->imagens->imagem) }}" alt="{{ $produto->nome }}"></a>
					<div class="card-body">
						<h5 class="card-title">{{ $produto->nome }}</h5>
						<p class="card-text texto-left">{{ substr($produto->descricao, 0, 70) }}</p>
						<p class="card-text texto-left">R${{ number_format($produto->valor,2,",",".") }}</p>
					</div>

					<div class="card-body d-flex justify-content-between">
						<a href="{{ route('produto/edit', $produto->id) }}" class="btn btn-primary btn-sm card-link">Editar Anúncio</a>
						<a href="{{ route('produto/show', $produto->id) }}" class="btn btn-dark btn-sm card-link">Visualizar</a>
                        @if($produto->situacao ===1)
						<form action="{{ action('ProdutoController@destroy', $produto->id) }}" method="POST">
							@csrf
							<button class="btn btn-danger btn-sm card-link" type="submit" onclick="return confirm('Você tem certeza que quer inativar?')"><i class="fa fa-trash" aria-hidden="true"></i></button>
						</form>
                        @else
                            <form action="{{ action('ProdutoController@ativa', $produto->id) }}" method="POST">
                                @csrf
                                <button class="btn btn-success" type="submit" onclick="return confirm('Você tem certezaque quer ativar?')">Ativar</i></button>
                            </form>
                         @endif
					</div>
				</div>
			</div>
			@endforeach
		@else
		<div class="col md-12">
			<h3 class="text-center">Você não possui anúncios!</h3>
		</div>
		@endif
	</div>
</div>


@endsection
