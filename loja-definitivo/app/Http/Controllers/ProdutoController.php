<?php

namespace App\Http\Controllers;

use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produtos = Produto::orderBy('id')->paginate(100);
        return view('produto.index', compact('produtos'));
    }

    /**
     * Mostra os produtos cadastrados por usuário logado
     *
     * @return \Illuminate\Http\Response
     */
    public function meusAnuncios()
    {
        $id_usuario_logado = Auth::id();

        $produtos = DB::table('produto')
                    ->where([
                        ['user_id', '=' ,$id_usuario_logado],
                        ['situacao', '=' , 1]
                    ])
                    ->orderBy('id', 'desc')
                    ->get();

        return view('produto.index', compact('produtos'));
    }

    /**
     * Mostra os produtos cadastrados pela busca nos anúncios
     *@param  \App\Produto  $txtBusca
     * @return \Illuminate\Http\Response
     */
    public function buscaProdutos(Produto $txtBusca)
    {
        $id_usuario_logado = Auth::id();

        $produtos = DB::table('produto')
            ->where([
                ['user_id', '=' ,$id_usuario_logado],
                ['nome', '=' , $txtBusca]
            ])
            ->orderBy('id', 'desc')
            ->get();

        return view('produto.busca', compact('txtBusca'));
    }

    /**
     * Mostrar formulário do produto
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produto.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request - Receber valores do formulário
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$produto = new Produto();
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->valor = $request->valor;
        $produto->user_id  = Auth::id();
        $produto->categoria = $request->categoria;

        $file = $request->file('imagem');

        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/produtos_cadastrados/".($request->nome)."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $produto->imagem = $diretorio.'/'.$nomeArquivo;
        }
        if($produto->save()){
            return redirect('/produto')->with('success', 'Produto Adicionado');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Produto $produto)
    {
        return view('produto.show', compact('produto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Produto $produto)
    {
        return view('produto.edit', compact('produto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produto $produto)
    {
        $produto->nome = $request->nome;
        $produto->descricao = $request->descricao;
        $produto->valor = $request->valor;
        $produto->user_id = Auth::id();
        $file = $request->file('imagem');

        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/produtos_cadastrados/".($request->nome)."/";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);
            $produto->imagem = $diretorio.'/'.$nomeArquivo;
        }

        if($produto->save()){
            return redirect('/produto')->with('success', 'Produto Adicionado');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produto $produto)
    {
        $produto->situacao = 2;

        if($produto->save()){
            return redirect('/produto')->with('success', 'Produto Deletado');
        }
    }

    /**
     * Mostra os produtos por categoria
     *
     * @return \Illuminate\Http\Response
     */
    public function porCategoria(string  $categoria)
    {
        $produtos = DB::table('produto')
            ->where([

                ['categoria', '=' ,$categoria]
            ])
            ->orderBy('id', 'desc')
            ->get();

        return view('produto.categoria', compact('produtos', 'categoria'));
    }
}
