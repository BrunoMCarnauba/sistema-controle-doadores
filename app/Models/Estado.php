<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'estados'; /* Nome da tabela do banco de dados */

    public function carregarEstados(){
        $estados = Estado::all(); /* Retorna um vetor com todos as linhas salvas do banco. */
        return $estados;
    }
}
