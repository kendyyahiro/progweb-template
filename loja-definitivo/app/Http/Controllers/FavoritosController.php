<?php

namespace App\Http\Controllers;

use App\Favoritos;
use App\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FavoritosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('favoritos.index');
    }

    /**
     * O que faz: 
     * 
     * Usado em: 
     * 
     */
    public function favoritarProduto(Request $request){
        $id_produto = $request->get('produto_id');
        $id_usuario_logado = Auth::id();

        //Verificar se esse produto já foi adicionado no favoritos alguma vez.
        $produto_favorito = Favoritos::
            where([
                ['user_id', '=', $id_usuario_logado],
                ['produto_id', '=', $id_produto]
            ])->first();
        
        if(empty($produto_favorito)){
            $produto_favorito = new Favoritos();
            $produto_favorito->produto_id = $id_produto;
            $produto_favorito->user_id = $id_usuario_logado;
        }else{
            $produto_favorito->situacao =  1 - $produto_favorito->situacao;
        }

        if($produto_favorito->save()){
            return json_encode(["sucesso" => "sucesso"]);
        }

    }

}
