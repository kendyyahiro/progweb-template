

@extends('template.common.base')

@section('conteudo')

<h1>Adicionar produto aqui</h1>

@if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ action('ProdutoController@store') }}">
          @csrf
          <div class="form-group">    
              <label for="nome">Nome:</label>
              <input type="text" class="form-control" name="nome"/>
          </div>

          <div class="form-group">
              <label for="descricao">Descrição:</label>
              <input type="text" class="form-control" name="descricao"/>
          </div>
          <button type="submit" class="btn btn-primary-outline">Adicionar produto</button>
      </form>
@endsection
