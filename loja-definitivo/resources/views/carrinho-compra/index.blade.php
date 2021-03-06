@extends('layouts.app')

@section('content')


<div class="container py-3">
	<div id="carrinho-compra-listagem">
		<h4>Meu carrinho</h4>
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
				@if(count($carrinhoCompra) != 0 )
					@foreach ($carrinhoCompra as $carrinho)
						<tr>
							<td scope="row">
								<div class="foto">
									<a href="{{ route('produto/show', $carrinho->produto_id) }}"><img class="card-img-top" src="{{ asset(@$carrinho->produto->imagens->imagem) }}" alt="{{ $carrinho->produto->nome }}"></a>
								</div>
							</td>
							<td width="150px"><span class="nome_produto">{{ $carrinho->produto->nome }}</span></td>
							<td><p class="descricao_produto">{{ $carrinho->produto->descricao }}</p></td>
							<td><span class="valor_produto">R${{ number_format($carrinho->produto->valor,2,",",".") }}</span></td>
							<td>
								<form action="{{ action('CarrinhoCompraController@destroy', $carrinho->id) }}" method="POST">
									@csrf
									<button class="btn btn-danger btn-sm card-link" type="submit" onclick="return confirm('Você tem certeza?')">Remover</button>
								</form>
							</td>
						</tr>
					@endforeach
					<tr>
						<td colspan="3"></td>
						<td id="valor-total-carrinho"> Total: <?= number_format($valor, 2, ",", ".") ?> </td>
						<td></td>
					</tr>
				@else
				<tr>
					<td colspan="4" class="text-center"><h3>Você ainda não possui produtos no carrinho!</h3></td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
	@if(count($carrinhoCompra) != 0 )
		<div id="finalizar-compra text-right">
			<a href="{{ route('transacao/finalizar-compra') }}" class="btn btn-success float-right" onclick="return confirm('Você confirma a finalização da compra?')">Finalizar Compra</a>
		</div>	
	@endif
</div>

@endsection