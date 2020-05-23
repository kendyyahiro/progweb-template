<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('pagina-inicial');


/*Produtos*/
rotasCrud('produto', 'ProdutoController');

/*Carrinho de compras*/
rotasCrud('carrinho-compra', 'CarrinhoCompraController');

Route::get('/carrinho-compra/adicionarCarrinho/{idProduto}', 'CarrinhoCompraController@adicionarCarrinho')->name('carrinho-compra/adicionarCarrinho')->middleware('auth');


//Rotas de autenticação
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/*Perfil*/
Route::get('/perfil/editar', 'PerfilController@editar')->name('perfil')->middleware('auth');

Route::get('/perfil/deletar/{id}',['as'=>'perfil.deletar', 'uses'=>'PerfilController@deletar']);

Route::post('/perfil/atualizar/{id}',['as'=>'perfil.atualizar', 'uses'=>'PerfilController@atualizar'])
    ->middleware('auth');

//listando produtos index
Route::get('/',['as'=>'home', 'uses'=>'IndexController@index']);
//Route::get('/',['as'=>'site.home', 'uses'=>'Site\HomeController@index']);