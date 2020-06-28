<?php


namespace App\Http\Controllers;
use App\Produto;


class IndexController extends Controller
{
    public function index()
    {
        //Utiliza a relação dos favoritos
        $produtos = Produto::with(['favoritos', 'imagens'])
        ->where([['situacao', '=' , 1]])
        ->orderBy('produto.id','desc')
        ->paginate(30);

        $direcaoImagem = ['center-align','left-align','right-align'];

        return view('index',compact('produtos','direcaoImagem'));
    }

}
