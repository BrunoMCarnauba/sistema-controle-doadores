<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaDoadores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doadores', function (Blueprint $table) {
            $table->increments('id_doador'); /* Chave primária */
            $table->string('cpf', 14)->unique(); /* Varchar com o máximo de 14 caracteres e único em toda a tabela */
            $table->string('nome');
            $table->string('email')->nullable();
            $table->string('telefone_fixo', 14)->nullable();
            $table->string('telefone_celular', 15)->nullable();
            $table->date('data_nascimento');
            $table->integer('endereco_id')->unsigned(); /* Chave estrangeira - Unsigned (Apenas numeros positivos) - Configurada abaixo \/ */
            $table->foreign('endereco_id')->references('id_endereco')->on('enderecos'); /* Chave estrangeira: referencia id_endereco da tabela enderecos */    
            $table->char('sexo', 1); /* Char com o máximo de 1 caracter (M ou F) */
            $table->string('tipo_sanguineo', 2); /* Exemplo: AB */
            $table->char('fator_Rh', 3); /* Exemplo: Rh+ */
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
        Schema::dropIfExists('doadores');
    }
}
