@extends('layouts.app')

@section('content')
<p><h4>Anúncios Recentes</h4></p>
<section class="container-fluid py-3">
	<div class="row">
		@for ($i = 1; $i <= 12; $i++)
		<div class="col-sm-2">
			<h3>Column {{ $i }}</h3>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
			<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
		</div>
		@endfor
	</div>
</section  class="space margin -bottom">
<!-- Deixar AQUI específico para 3 anúncios pré-programados para 3 tipos de produtos. -->
<section>
	<div class="container-fluid text-center py-3">
		<div class="row">
			@for ($i = 1; $i <= 3; $i++)
			<div class="col-sm-4">
				<h3>Anuncio Dedicado {{ $i }}</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit...</p>
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
			</div>
			@endfor
		</div>
	</div>
</section>

@endsection