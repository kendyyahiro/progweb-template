@extends('layouts.app')

@section('content')

<div class="container">
	<div class="catalogo">
		<h2>Meu carrinho</h2>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Imagem</th>
					<th scope="col">Nome do Produto</th>
					<th scope="col">Descrição</th>
					<th scope="col">Preço</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($produtos as $produto)
					<tr>
						<td scope="row">
							<div class="foto">
								<a href="{{ route('produto/show', $produto->id) }}"><img class="card-img-top" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}"></a>
							</div>
						</td>
						<td><span class="nome_produto">{{ $produto->nome }}</span></td>
						<td><span class="descricao_produto">{{ $produto->descricao }}</span></td>
						<td><span class="valor_produto">R${{ number_format($produto->valor,2,",",".") }}</span></td>
					</tr>
				@endforeach
				<tr>
					<td colspan="3"></td>
					<td> <strong>Total: <?= number_format($valor[0]->total, 2, ",", ".") ?> </strong> </td>
				</tr>
			</tbody>
		</table>
		
	</div>
</div>

@endsection