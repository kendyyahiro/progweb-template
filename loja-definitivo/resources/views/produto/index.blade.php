@extends('layouts.app')

@section('content')

<div class="container">
	<h1>Anúncios</h1>
	<div class="row">
		@if(count($produtos) != 0)
			@foreach ($produtos as $produto)
			<div class="col-md-3">
				<div class="card" style="width: 100%;">
					<a href="{{ route('produto/show', $produto->id) }}"><img class="card-img-top" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}"></a>
					<div class="card-body">
						<h5 class="card-title">{{ $produto->nome }}</h5>
						<p class="card-text">{{ $produto->descricao }}</p>
						<p class="card-text">R${{ number_format($produto->valor,2,",",".") }}</p>
					</div>

					<div class="card-body">
						<a href="{{ route('produto/show', $produto->id) }}" class="card-link">Ver mais..</a>
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