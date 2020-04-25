<?php 
use Illuminate\Support\Facades\Route;

/**
 * 
 * Esse método inicializa as rotas.
 * 
 * @param String $rota - Recebe a rota
 * @param String $controller - Controller a ser chamada
 */
function rotasCrud($rota, $controller){
	Route::get('/'.$rota, $controller.'@index')->name($rota);
	Route::get('/'.$rota.'/create', $controller.'@create')->name($rota.'/create');
	Route::get('/'.$rota.'/edit', $controller.'@edit')->name($rota.'/edit');
	Route::get('/'.$rota.'/show', $controller.'@show')->name($rota.'/show');
}
