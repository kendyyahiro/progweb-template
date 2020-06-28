<?php

namespace App\Http\Controllers;

use App\CarrinhoCompra;
use App\Transacao;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_usuario_logado = Auth::id();

        //Busca os produtos que o usuário adicionou no carrinho
        $transacao = DB::table('transacao')
                    ->where([
                        ['transacao.user_id', '=', $id_usuario_logado]
                    ])
                    ->orderByDesc('id')
                    ->get();

        return view('transacao.index', compact('transacao'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transacao  $Transacao
     * @return \Illuminate\Http\Response
     */
    public function show($transacao_id)
    {
        $id_usuario_logado = Auth::id();

        //Busca os produtos que o usuário adicionou no carrinho
        $produtos_transacao = CarrinhoCompra::join('produto', 'produto.id', '=', 'carrinho_compra.produto_id')
                    ->where([
                        ['carrinho_compra.transacao_id', '=', $transacao_id],
                        ['carrinho_compra.user_id', '=', $id_usuario_logado]
                    ])
                    ->orderByDesc('carrinho_compra.id')
                    ->get();

        return view('transacao.show', compact('produtos_transacao', 'transacao_id'));
    }

    /**
     * Esse método busca todos os produtos no carrinho do usuário logado
     * Depois cria uma nova transação com esses produtos.
     * 
     */
    public function finalizarCompra()
    {
        $id_usuario_logado = Auth::id();

        //Busca os produtos com status = 0, ou seja, não foram comprados ainda
        //Situacao = 1 caso ele não esteja excluído
        //E faz a soma total dos produtos
        $valor = DB::table('carrinho_compra')
                    ->select(DB::raw('SUM(produto.valor) as total'))
                    ->join('produto', 'produto.id', '=', 'carrinho_compra.produto_id')
                    ->where([
                        ['carrinho_compra.user_id', '=', $id_usuario_logado],
                        ['carrinho_compra.status', '=', 0],
                        ['carrinho_compra.situacao', '=', 1]
                    ])
                    ->get();

    	$transacao = new Transacao();
        $transacao->user_id = Auth::id();
        $transacao->data = new DateTime();
        $transacao->valor_total = $valor[0]->total;

        //Verifica se foi possível salvar
        if($transacao->save()){

            //Essa função irá buscar os valores com as condições passadas e irá atualizar o valores
            $afetados = CarrinhoCompra::where([
                ['user_id', '=', $id_usuario_logado],
                ['status', '=', 0],
                ['situacao', '=', 1]
            ])
            ->update(array(
                'status' => 1,
                'transacao_id' => $transacao->id
            ));

            //Verifica se teve itens alterados
            if($afetados > 0){
                return redirect('/carrinho-compra');
            }
        }
    }
}
