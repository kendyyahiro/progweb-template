@extends('layouts.app')

@section('content')

<div class="container">
	<h4>Favoritos</h4>

	<div class="row">
		@if(count($favoritos) != 0)
            @foreach ($favoritos as $favorito)

			<div class="col-12 col-sm-6 col-lg-4">
				<div class="card" style="width: 100%;">
					<a href="{{ route('produto/show', $favorito->produto->id) }}"><img class="produto-anunciado card-img-top" src="{{ asset($favorito->produto->imagem) }}" alt="{{ $favorito->produto->nome }}"></a>
					<div class="card-body">
						<h5 class="card-title">{{ $favorito->produto->nome }}</h5>
						<p class="card-text texto-left"> {{ substr($favorito->produto->descricao, 0, 70) }}</p>
						<p class="card-text texto-left">R${{ number_format($favorito->produto->valor,2,",",".") }}</p>
                    </div>
                    
                    @auth
						<button class="produto_anunciado kokoro" data-id="{{ $favorito->produto->id }}">
							<i class="fa {{ !empty($favorito->produto->favoritos) ? 'fa-heart' : 'fa-heart-o' }}" aria-hidden="true"></i>
						</button>
					@endauth

					<div class="card-body d-flex justify-content-between">
						<a href="{{ route('produto/show', $favorito->produto->id) }}" class="btn btn-dark btn-sm card-link">Visualizar</a>
					</div>
				</div>
			</div>
			@endforeach
		@else
		<div class="col md-12">
			<h3 class="text-center">Você não possui itens favoritados!</h3>
		</div>
		@endif
	</div>
</div>


@endsection
