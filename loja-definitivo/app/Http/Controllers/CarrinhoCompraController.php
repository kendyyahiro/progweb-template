<?php

namespace App\Http\Controllers;

use App\CarrinhoCompra;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarrinhoCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id_usuario_logado = Auth::id();
        $produtos = DB::table('carrinho_compra')
                    ->join('produto', 'produto.id', '=', 'carrinho_compra.produto_id')
                    ->get();

        return view('carrinho-compra.index', compact('produtos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('carrinho-compra.create');
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
     * @param  \App\CarrinhoCompra  $carrinhoCompra
     * @return \Illuminate\Http\Response
     */
    public function show(CarrinhoCompra $carrinhoCompra)
    {
        return view('carrinho-compra.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CarrinhoCompra  $carrinhoCompra
     * @return \Illuminate\Http\Response
     */
    public function edit(CarrinhoCompra $carrinhoCompra)
    {
        return view('carrinho-compra.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CarrinhoCompra  $carrinhoCompra
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CarrinhoCompra $carrinhoCompra)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CarrinhoCompra  $carrinhoCompra
     * @return \Illuminate\Http\Response
     */
    public function destroy(CarrinhoCompra $carrinhoCompra)
    {
        //
    }

    /**
     */
    public function adicionarCarrinho($idProduto)
    {
        $carrinhoCompra = new CarrinhoCompra();
        $carrinhoCompra->produto_id = $idProduto;
        $carrinhoCompra->user_id = Auth::id();

        if($carrinhoCompra->save()){
            return redirect('/carrinho-compra');
        }
    }
}
