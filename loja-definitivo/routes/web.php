<?php

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
Route::get('/produto', 'ProdutoController@index')->name('produto');
Route::get('/produto/create', 'ProdutoController@create')->name('produto');
Route::get('/produto/edit', 'ProdutoController@edit')->name('produto');
Route::get('/produto/show', 'ProdutoController@show')->name('produto');

/*Carrinho de compras*/
Route::get('/carrinho-compra', 'CarrinhoCompraController@index')->name('carrinho-compra');
Route::get('/carrinho-compra/create', 'CarrinhoCompraController@create')->name('carrinho-compra');
Route::get('/carrinho-compra/edit', 'CarrinhoCompraController@edit')->name('carrinho-compra');
Route::get('/carrinho-compra/show', 'CarrinhoCompraController@show')->name('carrinho-compra');

//Rotas de autenticação
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');