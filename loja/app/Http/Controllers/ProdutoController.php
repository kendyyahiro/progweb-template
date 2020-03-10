<?php

namespace App\Http\Controllers;

use App\ProdutoModel;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produto.index', ['produto' => 'testee']);
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
     * @param  \App\ProdutoModel  $produtoModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProdutoModel $produtoModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProdutoModel  $produtoModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProdutoModel $produtoModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProdutoModel  $produtoModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProdutoModel $produtoModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProdutoModel  $produtoModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProdutoModel $produtoModel)
    {
        //
    }
}
