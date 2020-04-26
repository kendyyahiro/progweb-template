@extends('layouts.app')

@section('content')


<div class="container">
    <form method="POST" action="{{ action('ProdutoController@store') }}">
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
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>
        {{ csrf_field() }}
    </form>
</div>


@endsection