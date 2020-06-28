@extends('layouts.app')

@section('content')

    <div class="container">
        <h3>Produtos encontrados: {{$aux}}</h3>

        <div class="row">
            @if(count($produtos) != 0)
                @foreach ($produtos as $produto)
                    <div class="col-md-4 pb-3">
                        <div class="card" style="width: 100%;">
                            <a href="{{ route('produto/show', $produto->id) }}"><img class="card-img-top" src="{{ asset($produto->imagens->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}"></a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $produto->nome }}</h5>
                                <p class="card-text texto-left">{{ $produto->descricao }}</p>
                                <p class="card-text texto-left">R${{ number_format($produto->valor,2,",",".") }}</p>
                            </div>

                            <div class="card-body">
                                <a href="{{ route('produto/show', $produto->id) }}" class="btn btn-dark card-link">Ver mais..</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col md-12">
                    <h4 class="text-center">Sem anúncios para essa busca!</h4>
                </div>
            @endif
        </div>
    </div>


@endsection
