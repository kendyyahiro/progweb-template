<?php 
use Illuminate\Support\Facades\Route;

/**
 * 
 * Esse método inicializa as rotas padrão do CRUD
 * index.blade.php
 * create.blade.php
 * edit.blade.php
 * show.blade.php
 * 
 * @param String $rota - Recebe a rota
 * @param String $controller - Controller a ser chamada
 * @param String $nameParam - Nome da variável que a controller recebe como parametro
 */
function rotasCrud($rota, $controller, $nameParam){
	Route::get('/'.$rota, $controller.'@index')->name($rota);
	Route::get('/'.$rota.'/create', $controller.'@create')->name($rota.'/create')->middleware('auth');
	Route::get('/'.$rota.'/edit/{'.$nameParam.'}', $controller.'@edit')->name($rota.'/edit')->middleware('auth');
	Route::get('/'.$rota.'/show/{'.$nameParam.'}', $controller.'@show')->name($rota.'/show')->middleware('auth');
	Route::post('/'.$rota.'/store', $controller.'@store')->name($rota.'/store')->middleware('auth');
	Route::post('/'.$rota.'/update/{'.$nameParam.'}', $controller.'@update')->name($rota.'/update')->middleware('auth');
	Route::post('/'.$rota.'/destroy/{'.$nameParam.'}', $controller.'@destroy')->name($rota.'/destroy')->middleware('auth');
}
