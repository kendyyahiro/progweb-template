@extends('layouts.app')

@section('content')


<div class="container">
    <h4>Cadastrar Anúncio</h4>

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

        <div class="input-field">
            <label>Categoria</label>
            <select name="categoria">
                <option value="Imóveis" {{(isset($produto->categoria) && $produto->categoria == 'Imóveis'  ? 'selected' : '')}}>Imóveis</option>
                <option value="Auto e peças" {{(isset($produto->categoria) && $produto->categoria == 'Auto e peças'  ? 'selected' : '')}}>Auto e peças</option>
                <option value="Para casa" {{(isset($produto->categoria) && $produto->categoria == 'Para casa'  ? 'selected' : '')}}>Para casa</option>
                <option value="Eletrônicos e celulares" {{(isset($produto->categoria) && $produto->categoria == 'Eletrônicos e celulares'  ? 'selected' : '')}}>Eletrônicos e celulares</option>
                <option value="Artigos infantis" {{(isset($produto->categoria) && $produto->categoria == 'Artigos infantis'  ? 'selected' : '')}}>Artigos infantis</option>
                <option value="Serviços" {{(isset($produto->categoria) && $produto->categoria == 'Serviços'  ? 'selected' : '')}}>Serviços</option>
                <option value="Esporte e lazer" {{(isset($produto->categoria) && $produto->categoria == 'Esporte e lazer'  ? 'selected' : '')}}>Esporte e lazer</option>
                <option value="Moda e beleza" {{(isset($produto->categoria) && $produto->categoria == 'Moda e beleza'  ? 'selected' : '')}}>Moda e beleza</option>
                <option value="Animais de estimação" {{(isset($produto->categoria) && $produto->categoria == 'Animais de estimação'  ? 'selected' : '')}}>Animais de estimação</option>
                <option value="Outros" {{(isset($produto->categoria) && $produto->categoria == 'Outros'  ? 'selected' : '')}}>Outros</option>

            </select>

        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </div>

        {{ csrf_field() }}
    </form>
</div>


@endsection
