@extends('layouts.app')

@section('content')


<div class="container">
    <h1>Atualizar Anúncio</h1>

    <form method="POST" action="{{ action('ProdutoController@store') }}" enctype="multipart/form-data">
        <div class="form-group">
            <label for="nome">Nome</label>
            <input type="text" name="nome" class="form-control"></input>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea name="descricao" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="valor">valor</label>
            <input type="number" name="valor" class="form-control"></input>
        </div>

        <div class="form-group">
                <div class="btn">
                    <label >Imagem</label>
                    <input type="file"  required  name="imagem">
                </div>
                @if(isset($produto->imagem))
                    <img width="120" src="{{ asset($produto->imagem) }}">
                @endif
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>

        {{ csrf_field() }}
    </form>
</div>


@endsection