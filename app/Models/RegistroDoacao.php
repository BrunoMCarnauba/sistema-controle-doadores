<?php

namespace App\Models;

//Importações
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; //Pra poder usar DB::select e outros
use App\Models\Doador;

class RegistroDoacao extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'registros_doacoes'; /* Nome da tabela do banco de dados */

    public function vezesDoou($idDoador){
        $vezesDoou = RegistroDoacao::where('doador_id', $idDoador)->count();
        return $vezesDoou;
    }

    public function buscarRegistroDoacao($idRegistro){
        $registroDoacao = RegistroDoacao::where('id_registro_doacao', $idRegistro)->first();
        return $registroDoacao;
    }

    public function atualizarRegistroPreTriagem($idRegistro,$idPreTriagem){
        DB::update('update registros_doacoes set `pre-triagem_id` = ? where `id_registro_doacao` = ?', [$idPreTriagem,$idRegistro]);
        //Falta mudar o status do registro de doação de acordo com a aprovação ou não aprovação
    }

    public function atualizarRegistroTriagem($idRegistro,$idTriagem){
        DB::update('update registros_doacoes set `triagem_id` = ? where `id_registro_doacao` = ?', [$idTriagem,$idRegistro]);
        //Falta mudar o status do registro de doação de acordo com a aprovação ou não aprovação
    }

    public function buscarInfosDoador($idRegistro){ //ESSE MÉTODO APARENTEMENTE ESTÁ COM PROBLEMA
        $doador = new Doador;
        $registroDoacao = DB::select('select cpf,id_registro_doacao from registros_doacoes inner join doadores on registros_doacoes.doador_id = doadores.id_doador where doador_id = ?', $idRegistro);

        if($registroDoacao!=null){
            $infosDoador = $doador->buscarInfosDoadorCPF($registroDoacao[0]->cpf);
            $infosDoador['id_registro_doacao'] = $registroDoacao[0]->id_registro_doacao;    //Adicionando 'id+registro_doacao' ao vetor
            return $infosDoador;
        } else{
            return null;
        }
    }

}
