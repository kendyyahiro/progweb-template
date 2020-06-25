@extends('layouts.app')


<style>
.bg-destaque{
	height: 300px;
	width: 100%;
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
}

</style>

@section('content')
<section id="produto-anunciado" class="container-fluid py-3">
	<h4>Anúncios Recentes</h4>

	<div class="row">

		@foreach ($produtos as $produto)
            <div class="col-12 col-sm-4 col-xl-2">
				<div class="card" style="width: 100%;">
					<a href="{{ route('produto/show', $produto->id) }}" class="position-relative">
						<img class="produto-anunciado card-img-top" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}">
					</a>
					@auth
						<button class="produto_anunciado kokoro" data-id="{{ $produto->id }}">
							<i class="fa {{ !empty($produto->favoritos) ? 'fa-heart' : 'fa-heart-o' }}" aria-hidden="true"></i>
						</button>
					@endauth

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
</section  class="space margin -bottom">
<section>
	<div class="container-fluid">
		<div class="row imagem-exemplos-cat">
			<div class="imagem-responsivo-cat bg-destaque col-md-12 col-xs-4 col-sm-4 img-responsive">
				<img src="{{ asset('img/img_layout/Aluguel_Compra.png')}}">
			</div>
			<div class="imagem-responsivo-cat bg-destaque col-md-12 col-xs-4 col-sm-4 img-responsive">
				<img src="{{ asset('img/img_layout/Smartphone.png')}}">
			</div>
			<div class="imagem-responsivo-cat bg-destaque col-md-12 col-xs-4 col-sm-4 img-responsive">
				<img src="{{ asset('img/img_layout/Instrumentos_Musicais.png')}}">
			</div>
			
		</div>

		<p><h4>Tendências</h4></p>

		<!-- <div class="row">
			<div class="col-4 col-sm-4 col-xl-4">
				<img class="card-img-top" src="{{ asset('img/img_layout/Vagas_Estágio.png') }}">
			</div>
			<div class="imagem-responsivo-cat bg-destaque col-md-12 col-xs-4 col-sm-4 img-responsive">
				<img src="{{ asset('img/img_layout/Smartphone.png')}}">
				<img src="{{ asset('img/img_layout/Smartphone.png')}}">
			</div>
			<div class="col-4 col-sm-4 col-xl-4">
				<img class="card-img-top" src="{{ asset('img/img_layout/Vagas_Estágio.png') }}">
			</div>
		</div> -->
	</div>
</section>

@endsection

