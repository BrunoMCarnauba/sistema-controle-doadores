<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaRegistrosDoacoes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() /* Esse método é chamado quando enviamos uma migração para o banco de dados */
    {
        Schema::create('registros_doacoes', function (Blueprint $table) {
            $table->increments('id_registro_doacao'); /* Chave primária */
            $table->integer('doador_id')->unsigned(); /* Chave estrangeira - Unsigned (Apenas numeros positivos) - Configurada abaixo \/ */
            $table->foreign('doador_id')->references('id_doador')->on('doadores'); /* Chave estrangeira: referencia id_doador da tabela doadores */
            $table->string('tipo_doacao');
            $table->string('status_registro');
            $table->integer('pre-triagem_id')->unsigned()->nullable();
            $table->foreign('pre-triagem_id')->references('id_pre-triagem')->on('pre-triagens'); /* Chave estrangeira */
            $table->integer('triagem_id')->unsigned()->nullable();
            $table->foreign('triagem_id')->references('id_triagem')->on('triagens'); /* Chave estrangeira */
            $table->boolean('apto')->nullable();
            $table->dateTime('data_doacao')->nullable();
            $table->boolean('auto-exclusao')->default(false); /* Indica que será feito os exames no sangue, mas não será utilizado no tratamento das pessoas. */
            $table->integer('funcionario_id')->unsigned()->nullable();
            $table->foreign('funcionario_id')->references('id_funcionario')->on('funcionarios'); /* Chave estrangeira */
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
        Schema::dropIfExists('registros_doacoes');
    }
}
