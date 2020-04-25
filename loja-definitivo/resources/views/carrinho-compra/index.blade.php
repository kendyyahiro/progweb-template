@extends('layouts.app')

@section('content')


<style type="text/css">
	body {
		background-color: #FFFFFF;
		margin: auto;
		padding: auto;
	}

	* {
		color: #0988BE;

	}

	/*CSS - Index*/

	#topo h1 {
		margin-top: 50px;
		margin-bottom: 0px; 
		font-size: 50px;
		font-family: goudy old style;
		color: #0988BE;
		text-decoration-style: bold;
		text-align: center;
	}

	.menu_home {
		top: 30;
		width: 100%;
	}

	.menu_home ul {
		font-family: goudy old style;
		text-align: center;
		font-size: 20px;
		list-style: none;
	}

	.menu_home ul li {
		padding: 10px;
		color: #0988BE;
	}

	.menu_home ul li a:hover {
		color: #A52A2A;
	}

	.menu_home ul li a:link {
		text-decoration: none;
	}

	/*CSS - Quem Somos*/

	.envolto {
		margin-top: 100px;
	}

	.perfil {
		flex-grow: 1;
		display: inline-block;
		flex-direction: column;
		justify-content: center;
		margin: 20px;
		text-align: center;
	}

	.foto img {
		width: 150px;
	}

	.informacoes_perfil {
		font-family: goudy old style;
		font-size: 1.25em;
		font-weight: lighter;
		padding-top: 15px;
	}

	.informacoes_perfil span {
		display: block;
		line-height: 1.5em;
		text-align: center;
	}

	.menu_return {
		margin-top: 70px;
	}

	.menu_return ul {
		font-family: goudy old style;
		text-align: center;
		font-size: 20px;
		list-style: none;
	}

	.menu_return ul li {
		padding: 10px;
		color: #0988BE;
		display: inline;
	}

	.menu_return ul li a:hover {
		color: #A52A2A;
	}

	.menu_return ul li a:link {
		text-decoration: none;
	}

	.catalogo {
		margin-top: 30px;
	}

	.produto {
		display: flex;
		margin: 20px;
	}

	.informacoes_produtos {
		font-family: goudy old style;
		font-size: 1.25em;
		font-weight: lighter;
		/*padding-top: 15px;*/
		margin-left: 20px;
	}

	.informacoes_produtos span {
		display: block;
		line-height: 1.5em;
		text-align: left;
	}

	.menu_produtos {
		margin-top: 40px;
	}

	.menu_produtos ul {
		font-family: goudy old style;
		text-align: center;
		font-size: 20px;
		list-style: none;
	}

	.menu_produtos ul li {
		padding: 10px;
		color: #0988BE;
		display: inline;
	}

	.menu_produtos ul li a:hover {
		color: #A52A2A;
	}

	.menu_produtos ul li a:link {
		text-decoration: none;
	}
</style>

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