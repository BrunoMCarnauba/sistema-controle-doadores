<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriandoTabelaAgendamentos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() /* Esse método é chamado quando enviamos uma migração para o banco de dados */
    {
        Schema::create('agendamentos', function (Blueprint $table) {
            $table->increments('id_agendamento');   //Chave primária
            $table->integer('registro_doacao_id')->unsigned();   /* Chave estrangeira - Unsigned (Apenas numeros positivos) - Configurada abaixo \/ */
            $table->foreign('registro_doacao_id')->references('id_registro_doacao')->on('registros_doacoes');   //Chave estrangeira: Referencia a coluna 'id_registro_doacao' da tabela 'registros_doacoes'
            $table->dateTime('data_agendada');  //ANO-MM-DD-HH:MM:SS
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
        Schema::dropIfExists('agendamentos');
    }
}
