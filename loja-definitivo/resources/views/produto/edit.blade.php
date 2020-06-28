@extends('layouts.app')

@section('content')


<div class="container">
    <h4>Atualizar Anúncio</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form id="form-produto" method="POST" action="{{ action('ProdutoController@update', $produto->id) }}" enctype="multipart/form-data">
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
        @csrf
    </form>

    <form action="{{ route('produto/media') }}" class="dropzone" id="image-upload" data-produto-id="{{ $produto->id }}">
        @csrf
        <div class="fallback">
            <!-- <input id="dropzone-image" name="file" type="file" multiple /> -->
        </div>
    </form>

    <button type="submit" id="btn-submit-produto" class="btn btn-primary mt-3">Atualizar</button>
</div>


@endsection