<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cargo extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'cargos'; /* Nome da tabela do banco de dados */


    public function carregarCargos(){
        $cargos = Cargo::all(); /* Retorna um vetor com todos as linhas salvas do banco. */
        return $cargos;
    }

    public function buscarIdCargo($nome){ /* Busca o id do cargo no banco de dados através do nome */
        $cargo = Cargo::where('nome', $nome)->first(); /* Busca um único resultado - Busca a linha do cargo com determinado nome  */
        return $cargo->id_cargo;
    }
}
