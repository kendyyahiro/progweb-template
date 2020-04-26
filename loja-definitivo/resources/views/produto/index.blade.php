@extends('layouts.app')

@section('content')


<div class="container">
	<div class="catalogo">
		<div class="produto">
			<div class="foto">
				<img src="{{ asset('img/produto.png') }}">
			</div>
			<div class="informacoes_produtos">
				<span class="nome_produto">Produto1</span>
				<span class="descricao_produto">Descrição do produto</span>
				<span class="valor_produto">R$100,00</span>
			</div>
		</div>
		<div class="produto">
			<div class="foto">
				<img src="{{ asset('img/produto.png') }}">
			</div>
			<div class="informacoes_produtos">
				<span class="nome_produto">Produto1</span>
				<span class="descricao_produto">Descrição do produto</span>
				<span class="valor_produto">R$100,00</span>
			</div>
		</div>

		<div class="produto">
			<div class="foto">
				<img src="{{ asset('img/produto.png') }}">
			</div>
			<div class="informacoes_produtos">
				<span class="nome_produto">Produto1</span>
				<span class="descricao_produto">Descrição do produto</span>			
				<span class="valor_produto">R$100,00</span>
			</div>
		</div>
	</div>
</div>


@endsection