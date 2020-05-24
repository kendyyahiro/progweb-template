@extends('layouts.app')

@section('content')

<div class="container">
	<h1>Meus Anúncios</h1>
	<div class="row">
		@if(count($produtos) != 0)
			@foreach ($produtos as $produto)
			<div class="col-md-4">
				<div class="card" style="width: 100%;">
					<a href="{{ route('produto/show', $produto->id) }}"><img class="card-img-top" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}"></a>
					<div class="card-body">
						<h5 class="card-title">{{ $produto->nome }}</h5>
						<p class="card-text">{{ $produto->descricao }}</p>
						<p class="card-text">R${{ number_format($produto->valor,2,",",".") }}</p>
					</div>

					<div class="card-body d-flex justify-content-between">
						<a href="{{ route('produto/edit', $produto->id) }}" class="btn btn-primary btn-sm card-link">Editar Anúncio</a>
						<a href="{{ route('produto/show', $produto->id) }}" class="btn btn-dark btn-sm card-link">Visualizar</a>

						<form action="{{ action('ProdutoController@destroy', $produto->id) }}" method="POST">
							@csrf
							<button class="btn btn-danger btn-sm card-link" type="submit" onclick="return confirm('Você tem certeza?')">Apagar</button>
						</form>
					</div>
				</div>
			</div>
			@endforeach
		@else
		<div class="col md-12">
			<h2 class="text-center">Você não possui anúncios!</h2>
		</div>
		@endif
	</div>
</div>


@endsection