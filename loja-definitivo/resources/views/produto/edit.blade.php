@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Cadastrar Anúncio</h1>

    <form method="POST" action="{{ action('ProdutoController@update', $produto->id) }}" enctype="multipart/form-data">
        <div class="form-group"> 
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control" value="{{ $produto->nome }}"></input>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control">{{ $produto->descricao }}</textarea>
        </div>

        <div class="form-group">
            <label for="valor">Valor</label>
            <input type="number" name="valor" class="form-control" value="{{ $produto->valor }}"></input>
        </div>

        <div class="form-group">
            <label >Imagem</label>
            <input type="file"  name="imagem" value="{{ $produto->imagem }}">
            @if(isset($produto->imagem))
                <img width="120" src="{{ asset($produto->imagem) }}">
            @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </div>

        {{ csrf_field() }}
    </form>
</div>


@endsection