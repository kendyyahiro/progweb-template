@extends('layouts.app')

@section('content')


<div class="container">
	<div id="carrinho-compra-listagem">
		<h2>Meu carrinho</h2>
		<table class="table">
			<thead class="thead-dark">
				<tr>
					<th scope="col">Imagem</th>
					<th scope="col">Nome do Produto</th>
					<th scope="col">Descrição</th>
					<th scope="col">Preço</th>
					<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				@if(count($produtos) != 0 )
					@foreach ($produtos as $produto)
						<tr>
							<td scope="row">
								<div class="foto">
									<a href="{{ route('produto/show', $produto->produto_id) }}"><img class="card-img-top" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}"></a>
								</div>
							</td>
							<td width="150px"><span class="nome_produto">{{ $produto->nome }}</span></td>
							<td><p class="descricao_produto">{{ $produto->descricao }}</p></td>
							<td><span class="valor_produto">R${{ number_format($produto->valor,2,",",".") }}</span></td>
							<td>
								<form action="{{ action('CarrinhoCompraController@destroy', $produto->id) }}" method="POST">
									@csrf
									<button class="btn btn-danger btn-sm card-link" type="submit" onclick="return confirm('Você tem certeza?')">Remover</button>
								</form>
							</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="3"></td>
						<td id="valor-total-carrinho"> Total: <?= number_format($valor[0]->total, 2, ",", ".") ?> </td>
					</tr>
				@else
				<tr>
					<td colspan="4" class="text-center"><h2>Você ainda não possui produtos no carrinho!</h2></td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
	@if(count($produtos) != 0 )
		<div id="finalizar-compra text-right">
			<a href="{{ route('transacao/finalizar-compra') }}" class="btn btn-success float-right" onclick="return confirm('Você confirma a finalização da compra?')">Finalizar Compra</a>
		</div>	
	@endif
</div>

<script>
	console.log($("filtroBusca"));
</script>

@endsection