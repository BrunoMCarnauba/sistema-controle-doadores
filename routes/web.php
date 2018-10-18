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

Route::get('/', 'LoginController@login')->name('login');
Route::get('/login', 'LoginController@login');
Route::post('/logar', 'LoginController@logar');

Route::get('/menu', 'FuncionarioController@menu')->name('menu');
Route::get('/recepcao', 'FuncionarioController@Recepcao')->name('recepcao');

Route::get('/cadastro-funcionario', 'FuncionarioController@cadastroFuncionario')->name('cadastroFuncionario');
Route::post('/cadastrar-funcionario', 'FuncionarioController@cadastrarFuncionario')->name('cadastrarFuncionario');

Route::get('/cadastro-doador','DoadorController@cadastroDoador')->name('cadastroDoador');
Route::post('/cadastrar/metodo{id}}', 'DoadorController@cadastrarDoador')->name('cadastrarDoador');

Route::get('/registro-doacao', 'RegistroDoacaoController@registroDoacao')->name('registroDoacao');
Route::get('/registro-doacao/buscar-doador', 'RegistrarDoacaoController@buscarDoador')->name('regDoacaoBuscarDoador');
Route::get('/registrar-doacao','RegistroDoacaoController@registrarDoacao')->name('registrarDoacao');

/*
Pré-triagem, triagem, agendamento, busca
*/




