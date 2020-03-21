

@extends('template.common.base')

@section('conteudo')
<p><h4>Anúncios Recentes</h4></p> 
<section class="container-fluid">
	<div class="row">
		@for ($i = 1; $i <= 12; $i++)
		<div class="col-sm-2">
			<h4>Column {{ $i }}</h4>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
			<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
		</div>
		@endfor
	</div>  
</section  class="space margin -bottom"> 
<!-- Deixar AQUI específico para 3 anúncios pré-programados para 3 tipos de produtos. -->
<section>
	<div class="container-fluid text-center">
		<div class="row">
			@for ($i = 1; $i <= 3; $i++)
			<div class="col-sm-4">
				<h4>Anuncio Dedicado {{ $i }}</h4>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
			</div>
			@endfor
		</div> 
	</div>
</section>

@endsection 
