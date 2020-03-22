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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', function(){
	return view('index');
});

//Quando utiliza o middleware('auth'), você verifica se o usuário está logado.
Route::get('/produto', 'ProdutoController@index');

Route::get('/produto/create', 'ProdutoController@create')
	->middleware('auth');
Route::post('/produto/store', 'ProdutoController@store')
	->middleware('auth');

Route::get('/home', 'HomeController@index')->name('home');
Auth::routes();