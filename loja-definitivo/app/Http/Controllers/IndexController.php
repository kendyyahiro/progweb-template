<?php


namespace App\Http\Controllers;
use App\Produto;


class IndexController extends Controller
{
    public function index()
    {
        //Utiliza a relação dos favoritos
        $produtos = Produto::orderBy('produto.id')
        ->with(['favoritos'])
        ->paginate(100);

        $direcaoImagem = ['center-align','left-align','right-align'];

        return view('index',compact('produtos','direcaoImagem'));
    }

}
