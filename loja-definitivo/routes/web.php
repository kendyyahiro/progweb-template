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
rotasCrud('produto', 'ProdutoController', 'produto');
Route::get('/produto/meus-anuncios', 'ProdutoController@meusAnuncios')->name('produto/meus-anuncios')->middleware('auth');
Route::get('/produto/categoria/{categoria}', 'ProdutoController@porCategoria')-> name('produto/categoria');

/*Carrinho de compras*/
rotasCrud('carrinho-compra', 'CarrinhoCompraController', 'carrinhoCompra');

Route::get('/carrinho-compra/adicionarCarrinho/{idProduto}', 'CarrinhoCompraController@adicionarCarrinho')->name('carrinho-compra/adicionarCarrinho')->middleware('auth');
Route::get('/carrinho-compra/finalizarCompra/{idCarrinhoCompra}', 'CarrinhoCompraController@finalizarCompra')->name('carrinho-compra/finalizarCompra')->middleware('auth');

/*Transacao */
Route::get('/transacao/finalizar-compra', 'TransacaoController@finalizarCompra')->name('transacao/finalizar-compra')->middleware('auth');
Route::get('/transacao/minhas-compras', 'TransacaoController@index')->name('transacao/minhas-compras')->middleware('auth');
Route::get('/transacao/detalhes/{transacao_id}', 'TransacaoController@show')->name('transacao/detalhes')->middleware('auth');

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

/*Busca*/
Route::get('/produto/busca',['as'=>'busca', 'uses'=>'ProdutoController@buscaProduto']);

