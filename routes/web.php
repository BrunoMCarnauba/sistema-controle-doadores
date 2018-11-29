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

Route::get('/carregar-fila-{tipo}-{quantidade}', 'FilaController@carregarFila'); //Carregar fila - Atualmente usado pelo javascript filas.js

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

Route::get('/chamar-doador-triagem', 'RecepcaoController@chamarDoadorTriagem')->name('chamarDoadorTriagem');    //Chama a rota de pré-triagem se houver ao menos 1 doador na fila de espera para triagem.
Route::get('/chamar-doador-doacao-sangue', 'RecepcaoController@chamarDoadorSangue')->name('chamarDoadorSangue');
Route::get('/chamar-doador-doacao-medula-ossea', 'RecepcaoController@chamarDoadorMedulaOssea')->name('chamarDoadorMedulaOssea');

Route::get('/pre-triagem', 'PreTriagemController@preTriagem')->name('pre-triagem');
Route::post('/registrar-pre-triagem', 'PreTriagemController@registrarPreTriagem')->name('registrarPreTriagem');

Route::get('/triagem', 'TriagemController@triagem')->name('triagem');   //Só é chamado se o doador tiver sido aprovado na pré-triagem.
Route::post('/registrar-triagem', 'TriagemController@registrarTriagem')->name('registrarTriagem');

/*
Pré-triagem, triagem, agendamento, busca, visualização agendamento
*/
});

//TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE TESTE
Route::get('/testes', 'PreTriagemController@teste');



