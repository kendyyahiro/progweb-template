@extends('layouts.app')

@section('content')

<style>
    
    
</style>

<div class="container">
	<div id="transacao-listagem">
		<h2>Minhas Compras</h2>
		<table class="table">
			<thead class="thead-dark">
				<tr>
                    <th scope="col">Pedido</th>
					<th scope="col">Data</th>
                    <th scope="col">Valor</th>
                    <th></th>
				</tr>
			</thead>
			<tbody>
				@if(count($transacao) != 0 )
                    @foreach ($transacao as $transacao)
					<tr>
                        <td>{{ $transacao->id }}</td>
                        <td>{{ date_format(date_create($transacao->data) , 'd/m/Y H:i') }}</td>
                        <td>R$ {{ number_format($transacao->valor_total,2,",",".") }}</td>
                       <td><a href="{{ route('transacao/detalhes', $transacao->id) }}" class="btn btn-success float-right">Detalhes da Compra</a></td>
                    </tr>
                    @endforeach
				@else
				<tr>
					<td colspan="4" class="text-center"><h3>Você ainda não possui produtos comprados!</h3></td>
				</tr>
				@endif
			</tbody>
		</table>
	</div>
</div>

@endsection