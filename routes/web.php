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

//No método GET envia as informações na URL
//O POST envia os dados oculto no corpo da requisição (Não é visível ao usuário)

Route::get('/', 'LoginController@login')->name('login'); //Não vai ser enviado nada, por isso não precisa ser post, pode ser get
Route::get('/login', 'LoginController@login');
Route::post('/logar', 'LoginController@logar');
Route::get('/logout', 'LoginController@logout');
Route::get('/carregar-cidades-de-{siglaEstado}', 'CidadeController@carregarCidades');
Route::get('/existencia-doador-{cpf}', 'RegistroDoacaoController@buscarDoador');


Route::group(['middleware' => 'login'], function() {

Route::get('/menu', 'FuncionarioController@menu')->name('menu');
Route::get('/recepcao', 'RecepcaoController@Recepcao')->name('recepcao');

Route::get('/cadastro-funcionario', 'FuncionarioController@cadastroFuncionario')->name('cadastroFuncionario');
Route::post('/cadastrar-funcionario', 'FuncionarioController@cadastrarFuncionario')->name('cadastrarFuncionario');

Route::get('/cadastro-doador','DoadorController@cadastroDoador')->name('cadastroDoador');
Route::post('/cadastrar/metodo-{id}', 'DoadorController@cadastrarDoador')->name('cadastrarDoador');

Route::get('/registro-doacao', 'RegistroDoacaoController@registroDoacao')->name('registroDoacao');
Route::post('/registro-doacao/buscar-doador', 'RegistroDoacaoController@buscarDoador')->name('regDoacaoBuscarDoador');
Route::post('/registrar-doacao','RegistroDoacaoController@registrarDoacao')->name('registrarDoacao');

/*
Pré-triagem, triagem, agendamento, busca, visualização agendamento
*/
});




