<?php

namespace App\Http\Controllers;

use App\ImagensProdutos;
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
        $id_usuario_logado = Auth::id();

        $produtos = Produto::with(['imagens'])
                    ->where([
                        ['user_id', '=' ,$id_usuario_logado],
                        ['situacao', '=' , 1]
                    ])
                    ->orderBy('id', 'desc')
                    ->get();

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

        $produtos = Produto::with(['imagens'])
                    ->where([
                        ['user_id', '=' ,$id_usuario_logado],
                        ['situacao', '=' , 1]
                    ])
                    ->orderBy('id', 'desc')
                    ->get();

        return view('produto.index', compact('produtos'));
    }

    /**
     * Mostra os produtos Inativos cadastrados por usuário logado
     *
     * @return \Illuminate\Http\Response
     */
    public function meusAnunciosInativos()
    {
        $id_usuario_logado = Auth::id();

        $produtos = Produto::where([
            ['user_id', '=' ,$id_usuario_logado],
            ['situacao', '=' , 0]
        ])
            ->orderBy('id', 'desc')
            ->get();

        return view('produto.index', compact('produtos'));
    }

    /**
     * Mostra os produtos cadastrados pela busca nos anúncios
     *
     * @return \Illuminate\Http\Response
     */
    public function buscaProduto(Request $request)
    {
        $busca = $request->all();
        $aux = $busca['texto'];

        if ($busca['texto'] != '') {
            $teste = [
                ['nome', 'like', '%' . $busca['texto'] . '%']
            ];
        } else {
            $teste = [
                ['nome', '<>', null]
            ];
        }
        $produtos = Produto::where($teste)
            ->orderBy('id', 'desc')
            ->get();

        return view('produto.busca', compact('produtos', 'aux'));
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

        $files = $request->document;

        /** Salva o produto antes de salvar as imagens **/
        if($produto->save()){
            /** Verifica se existe arquivos a serem salvos **/
            if($files){
                /** Deletar imagens que estavam cadastradas antes com esse id do produto **/
                ImagensProdutos::where('produto_id', $produto->id)->delete();

                foreach ($files as $file) {
                    $imagem = new ImagensProdutos();

                    $diretorio = "img/produtos_cadastrados";

                    /** Cria a relação do produto com a imagem **/
                    $imagem->produto_id = $produto->id;
                    $imagem->imagem = $diretorio.'/'.$file;

                    /** Salva a imagem **/
                    $imagem->save();
                }
            }

            /** Redireciona para a tela de produtos cadastrados **/
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
        $imagens = $produto->imagens()->get();
        return view('produto.show', compact('produto', 'imagens'));
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
        $files = $request->document;

        /** Salva o produto antes de salvar as imagens **/
        if($produto->save()){
            /** Verifica se existe arquivos a serem salvos **/
            if($files){
                /** Deletar imagens que estavam cadastradas antes com esse id do produto **/
                ImagensProdutos::where('produto_id', $produto->id)->delete();

                foreach ($files as $file) {
                    $imagem = new ImagensProdutos();

                    $diretorio = "img/produtos_cadastrados";

                    /** Cria a relação do produto com a imagem **/
                    $imagem->produto_id = $produto->id;
                    $imagem->imagem = $diretorio.'/'.$file;

                    /** Salva a imagem **/
                    $imagem->save();
                }
            }

            /** Redireciona para a tela de produtos cadastrados **/
            return redirect('/produto/meus-anuncios')->with('success', 'Produto Adicionado');
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
        $produto->situacao = 0;

        if($produto->save()){
            return redirect('/produto')->with('success', 'Produto Deletado');
        }
    }

    /**
     * Mudar a situação do produto para ativa
     *
     * @param  \App\Produto  $produto
     * @return \Illuminate\Http\Response
     */
    public function ativa(Produto $produto)
    {
        $produto->situacao = 1;

        if($produto->save()){
            return redirect('/produto')->with('success', 'Produto Ativado');
        }
    }

    /**
     * Mostra os produtos por categoria
     *
     * @return \Illuminate\Http\Response
     */
    public function porCategoria(string  $categoria)
    {
        $produtos = Produto::with(['favoritos'])
            ->where([
                ['categoria', '=' ,$categoria]
            ])
            ->orderBy('id', 'desc')
            ->get();

        return view('produto.categoria', compact('produtos', 'categoria'));
    }

    /**
     * Mostra os produtos por categoria
     *
     * @return \Illuminate\Http\Response
     */
    public function storeImagem(Request $request)
    {
        $file = $request->file('file');

        if($file){
            $rand = rand(11111,99999);
            $diretorio = "img/produtos_cadastrados";
            $ext = $file->guessClientExtension();
            $nomeArquivo = "_img_".$rand.".".$ext;
            $file->move($diretorio,$nomeArquivo);

            return response()->json([
                'nome' => $nomeArquivo
            ]);
        }
    }

    // function fetch(Request $request)
    // {
    //     $images = ImagensProdutos::where([
    //         ['produto_id', '=', $request->id]
    //     ]);
    //     $output = '<div class="row">';
    //     foreach ($images as $image) {
    //         $output .= '
    //             <div class="col-md-2" style="margin-bottom:16px;" align="center">
    //                 <img src="' . asset('images/' . $image->getFilename()) . '" class="img-thumbnail" width="175" height="175" style="height:175px;" />
    //                 <button type="button" class="btn btn-link remove_image" id="' . $image->getFilename() . '">Remove</button>
    //             </div>
    //         ';
    //     }
    //     $output .= '</div>';
    //     echo $output;
    // }
}
