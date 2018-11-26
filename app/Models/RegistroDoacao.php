<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Doador;

class RegistroDoacao extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'registros_doacoes'; /* Nome da tabela do banco de dados */

    public function vezesDoou($idDoador){
        $vezesDoou = RegistroDoacao::where('doador_id', $idDoador)->count();
        return $vezesDoou;
    }

}
