@extends('site.master.layout')
@section('conteudo')

	<div class="container">
	  <h2>Meus anúncios</h2>
	  <p>Caso queira excluir ou editar, fique a vontade, lindo <3</p><br>
	  @for ($i = 1; $i <= 5; $i++)
	  <div class="list-group">
		    <a href="#" class="list-group-item disabled">Disabled item {{$i}} </a>
	  </div>
	  @endfor
	</div>
@endsection()