<?php

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
Route::post('movimentacoes', 'MovimentacoesController@confirmMovimentacoes')->name('confirm.movimentacoes');
Route::get('movimentacoes', 'MovimentacoesController@index')->name('movimentacoes');

Route::post('funcionarios', 'FuncionariosController@cadFuncionario')->name('cad.func');
Route::get('funcionarios', 'FuncionariosController@index')->name('funcionarios');

Route::post('departamentos', 'DepartamentosController@cadDepartamento')->name('cad.depart');
Route::get('departamentos', 'DepartamentosController@index')->name('cadastro.departamentos');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
