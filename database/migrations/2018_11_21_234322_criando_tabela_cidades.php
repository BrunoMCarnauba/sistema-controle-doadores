<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaCidades extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cidades', function (Blueprint $table) {
            $table->increments('id_cidade'); /* Chave primária */
            $table->string('nome');
            $table->integer('estado_id')->unsigned(); /* Chave estrangeira - Unsigned (Apenas numeros positivos) - Configurada abaixo \/ */
            $table->foreign('estado_id')->references('id_estado')->on('estados'); /* Chave estrangeira: referencia id_estado da tabela estados */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cidades');
    }
}
