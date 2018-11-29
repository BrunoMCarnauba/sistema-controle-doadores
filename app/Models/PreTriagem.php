<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RegistroDoacao;

class PreTriagem extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'pre-triagens'; /* Nome da tabela do banco de dados */

    public function registrarPreTriagem($preTriagem,$idRegistroDoacao){
        //Verificação se foi aprovado ou não na pré-triagem
        //Peso>=50kg, temperatura axilar <= 37ºc, pulso> 50 <100, pressão sistólica <= 180mmHg, pressão diastólica >= 60mmHg e <= 100mmHg - http://bvsms.saude.gov.br/bvs/publicacoes/cd07_20.pdf página 16
        $resultado = ""; //Resultado esperado para ser aprovado

        $pressaoArterial = explode('/', $preTriagem->pressao_arterial);   //Separa a pressaoArterial que estava junta, exemplo: 120/80 em pressão siastólica =  120 e pressão diastólica = 80.
        print_r($pressaoArterial);
        if($pressaoArterial[0] > 180)
            $resultado = $resultado."|Pressão sistólica <= 180mmHg|";
        if($pressaoArterial[1] <= 60 || $pressaoArterial[1] >= 100)
            $resultado = $resultado." |Pressão diastólica entre 60mmHg e 100mmHg";
        if($preTriagem->temperatura_corporal > 37)
            $resultado = $resultado." |Temperatura < 37ºC|";
        if($preTriagem->peso < 50)
            $resultado = $resultado." |Peso > 50Kg|";
        if($preTriagem->pulso <50 || $preTriagem->pulso > 100)
            $resultado = $resultado." |Pulso entre 50 e 100|";

        $preTriagem->save();    //Salva no banco de dados a pré-triagem
        
        $registroDoacao = new RegistroDoacao;
        $registroDoacao->atualizarRegistroPreTriagem($idRegistroDoacao,$preTriagem->id);  //Atualizar registro de doação com id de pretriagem do registro de doacao

        return $resultado;
    }
}
