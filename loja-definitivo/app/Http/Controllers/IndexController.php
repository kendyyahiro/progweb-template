<?php


namespace App\Http\Controllers;
use App\Produto;


class IndexController extends Controller
{
    public function index()
    {
        $produtos = Produto::orderBy('id')->paginate(100);
        $direcaoImagem = ['center-align','left-align','right-align'];

        return view('index',compact('produtos','direcaoImagem'));
    }

}
