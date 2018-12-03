<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; //Pra poder usar DB::select e outros

class Agendamento extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = "agendamentos"; /* Nome da tabela do banco de dados */

    public function checarDisponibilidade($data){
        $agendamento = DB::select('SELECT * FROM agendamentos WHERE data_agendada = ?', $data);  //$data deve ser nesse formato: //ANO-MM-DD-HH:MM:SS
        return $agendamento;
    }
}
