@extends('layouts.app')

@section('content')

    <div class="container py-3">
        <h4>Vizualização da categoria: {{$categoria}}</h4>

        <div class="row">
            @if(count($produtos) != 0)
                @foreach ($produtos as $produto)
                    <div class="col-md-4">
                        <div class="card" style="width: 100%;">
                            <a href="{{ route('produto/show', $produto->id) }}">
                                <img class="produto-anunciado card-img-top" src="{{ asset($produto->imagem) }}" alt="{{ $produto->nome }}" alt="{{ $produto->nome }}">
                            </a>
                            <div class="card-body">
                                <h5 class="card-title">{{ $produto->nome }}</h5>
                                <p class="card-text texto-left">{{ $produto->descricao }}</p>
                                <p class="card-text texto-left">R${{ number_format($produto->valor,2,",",".") }}</p>
                            </div>

                            @auth
                                <button class="produto_anunciado kokoro" data-id="{{ $produto->id }}">
                                    <i class="fa {{ !empty($produto->favoritos) ? 'fa-heart' : 'fa-heart-o' }}" aria-hidden="true"></i>
                                </button>
                            @endauth

                            <div class="card-body d-flex justify-content-between">
                                <a href="{{ route('produto/edit', $produto->id) }}" class="btn btn-primary btn-sm card-link">Editar Anúncio</a>
                                <a href="{{ route('produto/show', $produto->id) }}" class="btn btn-dark btn-sm card-link">Visualizar</a>

                                <form action="{{ action('ProdutoController@destroy', $produto->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-danger btn-sm card-link" type="submit" onclick="return confirm('Você tem certeza?')">Apagar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <div class="col md-12">
                    <h3 class="text-center">Sem anúncios para essa categoria!</h3>
                </div>
            @endif
        </div>
    </div>


@endsection
