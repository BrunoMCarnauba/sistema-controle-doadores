<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaPreTriagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pre-triagens', function (Blueprint $table) {
            $table->increments('id_pre-triagem'); /* Chave primária */
            $table->integer('doador_id')->unsigned(); /* Chave estrangeira - Unsigned (Apenas numeros positivos) - Configurada abaixo \/ */
            $table->foreign('doador_id')->references('id_doador')->on('doadores'); /* Chave estrangeira: referencia id_doador da tabela doadores */ 
            $table->string('pressao_arterial', 7); /* Varchar com o máximo de 7 caracteres */
            $table->integer('temperatura_corporal');
            $table->integer('peso');
            $table->integer('altura');
            $table->integer('pulso');
            $table->timestamps(); /* Adiciona as colunas created_at e updated_at */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pre-triagens');
    }
}
