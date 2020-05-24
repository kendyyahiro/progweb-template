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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transacao  $Transacao
     * @return \Illuminate\Http\Response
     */
    public function show(Transacao $Transacao)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transacao  $Transacao
     * @return \Illuminate\Http\Response
     */
    public function edit(Transacao $Transacao)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transacao  $Transacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transacao $Transacao)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transacao  $Transacao
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transacao $Transacao)
    {
        //
    }

    public function finalizarCompra()
    {
        $id_usuario_logado = Auth::id();

        //Busca os produtos e faz a soma total dos produtos
        $valor = DB::table('carrinho_compra')
                    ->select(DB::raw('SUM(produto.valor) as total'))
                    ->join('produto', 'produto.id', '=', 'carrinho_compra.produto_id')
                    ->where('carrinho_compra.user_id', $id_usuario_logado)
                    ->get();

    	$transacao = new Transacao();
        $transacao->user_id = Auth::id();
        $transacao->data = new DateTime();
        $transacao->valor_total = $valor[0]->total;

        //Verifica se foi possível salvar
        if($transacao->save()){

            //Essa função irá buscar os valores com as condições passadas e irá atualizar o valores
            $afetados = DB::table('carrinho_compra')
            ->where([
                ['user_id', '=', $id_usuario_logado],
                ['status', '=', 0],
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
