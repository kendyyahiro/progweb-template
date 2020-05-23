<?php

namespace App\Http\Controllers;

use App\TransacaoModel;
use Illuminate\Http\Request;

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
     * @param  \App\TransacaoModel  $transacaoModel
     * @return \Illuminate\Http\Response
     */
    public function show(TransacaoModel $transacaoModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TransacaoModel  $transacaoModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TransacaoModel $transacaoModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TransacaoModel  $transacaoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransacaoModel $transacaoModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TransacaoModel  $transacaoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TransacaoModel $transacaoModel)
    {
        //
    }

    public function finalizarCompra($id)
    {
        $carrinhoCompra = new CarrinhoCompra();
        $carrinhoCompra->produto_id = $idProduto;
        $carrinhoCompra->user_id = Auth::id();

        if($carrinhoCompra->save()){
            return redirect('/carrinho-compra');
        }
    }
}
