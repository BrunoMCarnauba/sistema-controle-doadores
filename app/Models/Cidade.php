<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Estado;

class Cidade extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'cidades'; /* Nome da tabela do banco de dados */

    public function carregarCidades($siglaEstado){
        $estado = Estado::where('sigla', $siglaEstado)->first(); /* Busca a linha do estado da sigla especificada */
        $cidades = Cidade::where('estado_id', $estado->id_estado)->get(); /* Busca pelas cidades de determinado estado_id. Recebe um vetor com as linhas encontradas */

        return $cidades;
    }
}
