<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaTriagens extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triagens', function (Blueprint $table) {
            $table->increments('id_triagem'); /* Chave primária */
            $table->integer('doador_id')->unsigned(); /* Chave estrangeira - Unsigned (Apenas numeros positivos) - Configurada abaixo \/ */
            $table->foreign('doador_id')->references('id_doador')->on('doadores'); /* Chave estrangeira: referencia id_doador da tabela doadores */
            $table->text('observacoes')->nullable();
            $table->boolean('aprovacao');
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
        Schema::dropIfExists('triagens');
    }
}
