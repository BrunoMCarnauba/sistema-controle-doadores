<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaFilaDoadoresSangue extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() // Esse método é chamado quando enviamos uma migração para o banco de dados
    {
        Schema::create('fila_doadores_sangue', function (Blueprint $table) {
            $table->increments('id_fila_doador_sangue'); //Chave primária
            $table->integer('registro_doacao_id')->unsigned(); /* Chave estrangeira - Unsigned (Apenas numeros positivos) - Configurada abaixo \/ */
            $table->foreign('registro_doacao_id')->references('id_registro_doacao')->on('registros_doacoes'); /* Chave estrangeira: referencia id_registro_doacao da tabela registros_doacoes */
            $table->integer('posicao');
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
        Schema::dropIfExists('fila_doadores_sangue');
    }
}
