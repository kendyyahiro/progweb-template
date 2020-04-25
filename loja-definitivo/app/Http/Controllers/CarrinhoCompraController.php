<?php

namespace App\Http\Controllers;

use App\CarrinhoCompra;
use Illuminate\Http\Request;

class CarrinhoCompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('carrinho-compra.index');
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
}
