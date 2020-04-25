@extends('layouts.app')


<style>
.bg-destaque{
	height: 300px;
	width: 100%;
	background-size: contain;
	background-repeat: no-repeat;
	background-position: center;
}

</style>

@section('content')
<p><h4>Anúncios Recentes</h4></p>
<section id="produto-anunciado" class="container-fluid py-3">
	<div class="row">
		@for ($i = 1; $i <= 12; $i++)
		<div class="col-sm-2">
			<img src="{{ asset('img/img_layout/exemplo.png') }}" class="img-fluid">
			<p class="text-center pt-2"><strong>R$ {{$i + 12}},00</strong></p>
			<p class="text-center p-0">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris...</p>
		</div>
		@endfor
	</div>
</section  class="space margin -bottom">
<!-- Deixar AQUI específico para 3 anúncios pré-programados para 3 tipos de produtos. -->
<section>
<!-- Mexer dps no css que adulterei -->
	<div class="row"> 
	@for ($i = 1; $i <= 3; $i++)
		<div style="background-image:url({{ asset('img/img_layout/Aluguel_Compra.png') }});" class="bg-destaque col-sm-4"></div>
	@endfor
	</div>
</section>

@endsection