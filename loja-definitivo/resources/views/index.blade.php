@extends('layouts.app')



@section('content')
<section id="produto-anunciado" class="container-fluid py-3">
	<h4>Anúncios Recentes</h4>

	<div class="row">

		@foreach ($produtos as $produto)
            <div class="col-12 col-sm-4 col-xl-2 pb-3">
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
						<?php if(strlen($produto->descricao) < 70) : ?>
							<p class="card-text texto-left">{{$produto->descricao }}</p>
						<?php else : ?>
							<p class="card-text texto-left">{{ substr($produto->descricao, 0, 70) }} ...</p>
						<?php endif; ?>
						<p class="card-text texto-left">R${{ number_format($produto->valor,2,",",".") }}</p>
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
			<div class="imagem-responsivo-cat bg-destaque col-12 col-lg-4 img-responsive">
				<a href="{{ route('produto/categoria', $produto->categoria='Para casa') }}">
					<img src="{{ asset('img/img_layout/Aluguel_Compra.png')}}">
				</a>
			</div>
			<div class="imagem-responsivo-cat bg-destaque col-12 col-lg-4 img-responsive">
				<a href="{{ route('produto/categoria', $produto->categoria='Eletrônicos e celulares') }}">
					<img src="{{ asset('img/img_layout/Smartphone.png')}}">
				</a>

			</div>
			<div class="imagem-responsivo-cat bg-destaque col-12 col-lg-4 img-responsive">
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

<section id="informacoes">
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-4">
				<div class="d-flex flex-column justify-content-center align-items-center item">
					<img src="{{ asset('img/img_layout/cartao.png') }}" class="img-fluid">
					<h5 class="text-center">Pague com cartão de crédito ou boleto</h5>
				</div>
			</div>

			<div class="col-12 col-md-4">
				<div class="d-flex flex-column justify-content-center align-items-center item">
					<img src="{{ asset('img/img_layout/frete.png') }}" class="img-fluid">
					<h5 class="text-center">Frete grátis a partir de R$ 120</h5>
				</div>
			</div>

			<div class="col-12 col-md-4">
				<div class="d-flex flex-column justify-content-center align-items-center item">
					<img src="{{ asset('img/img_layout/seguranca.png') }}" class="img-fluid">
					<h5 class="text-center">Segurança, do início ao fim</h5>
				</div>
			</div>
		</div>
	</div>
</section>

@endsection

