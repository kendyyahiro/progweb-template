

@extends('template.common.base')

@section('conteudo')

<h1 class="text-center">Listagem de produtos aqui</h1>


<section>
	<div class="container">
		<div class="row">
			@foreach($produtos as $produto)
			<div class="col-12 col-md-4">
				<h2> Nome: {{ $produto->nome }} </h2>
				<h2> Descrição: {{ $produto->descricao }} </h2>
			</div>
			@endforeach
		</div>
	</div>
</section>


@endsection
