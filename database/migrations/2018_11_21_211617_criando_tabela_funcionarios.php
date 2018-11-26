<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaFuncionarios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() /* Esse método é chamado quando enviamos uma migração para o banco de dados */
    {
        Schema::create('funcionarios', function (Blueprint $table) { /* Classe Schema: Esta classe é responsável por fazer alteração em uma tabela. */
            $table->increments('id_funcionario'); /* Chave primária */
            $table->string('cpf', 14)->unique(); /* Varchar com o máximo de 14 caracteres e único em toda a tabela */
            $table->string('nome');
            $table->string('email');
            $table->string('telefone_fixo', 14)->nullable();
            $table->string('telefone_celular', 15)->nullable();
            $table->date('data_nascimento');
            $table->date('data_admissao')->default(date("Y-m-d"));
            $table->integer('cargo_id')->unsigned(); /* Chave estrangeira - Unsigned (Apenas numeros positivos) - Configurada abaixo \/ */
            $table->foreign('cargo_id')->references('id_cargo')->on('cargos'); /* Chave estrangeira: referencia id_cargo da tabela cargos */    
            $table->integer('endereco_id')->unsigned();
            $table->foreign('endereco_id')->references('id_endereco')->on('enderecos');
            $table->char('sexo', 1); /* Char com o máximo de 1 caracter (M ou F) */
            $table->string('usuario');
            $table->string('senha');
            $table->binary('foto')->nullable(); /* Equivalente ao tipo "blob" do MySql. Neste tipo é possível armazenar imagens. */
            $table->timestamps(); /* Adiciona as colunas created_at e updated_at */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() /* É chamado quando queremos desfazer a migração, ou seja, realizar um rollback. */
    {
        Schema::dropIfExists('funcionarios'); /* Classe Schema: Esta classe é responsável por fazer alteração em uma tabela. */
    }
}
