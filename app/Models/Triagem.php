<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegistroDoacao;

class Triagem extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'triagens'; /* Nome da tabela do banco de dados */

    public function registrarTriagem($triagem,$idRegistroDoacao){
        $triagem->save();
        $registroDoacao = new RegistroDoacao;
        $registroDoacao->atualizarRegistroTriagem($idRegistroDoacao,$triagem->id);  //Atualizar registro de doação com id de pretriagem do registro de doacao
    }
}
