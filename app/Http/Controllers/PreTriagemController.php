<?php

namespace App\Http\Controllers;

//Importações
use Illuminate\Http\Request;
use App\Models\PreTriagem;
use App\Models\RegistroDoacao;

class PreTriagemController extends Controller
{
    public function preTriagem(){
        return view ('TelaPreTriagem');
    }

    public function registrarPreTriagem(Request $request){
        $request->validate([
            'pressaoArterial' => 'required',
            'temperaturaCorporal' => 'required',
            'peso' => 'required',
            'altura' => 'required',
            'pulso' => 'required'
        ]);
        //Se passar na validação ele executa o código abaixo.
        $preTriagem = new PreTriagem;
        
        $id_registro_doacao = $request->session()->get('infosDoador')['id_registro_doacao']; //Pega o id_registro_doacao que está na sessão infosDoador  
        $id_doador = $request->session()->get('infosDoador')['id_doador']; //Pega o id_doador que está na sessão infosDoador  

        $preTriagem->doador_id = $id_doador;
        $preTriagem->pressao_arterial = $request->pressaoArterial;
        $preTriagem->temperatura_corporal = $request->temperaturaCorporal;
        $preTriagem->peso = $request->peso;
        $preTriagem->altura = $request->altura;
        $preTriagem->pulso = $request->pulso;
        
        $resultado = $preTriagem->registrarPreTriagem($preTriagem,$id_registro_doacao);
        
        if($resultado == ""){
            //A sessão infosDoador continua ativa
            return redirect()->route('triagem')->with('notificacao', 'Pré-triagem registrada com sucesso.');
        } else {
            //A sessão infosDoador é apagada, pois não precisará usá-la na próxima página já que o doador não foi aprovado.
            //$request->session()->forget('infosDoador');
            return redirect()->route('recepcao')->with('notificacao', 'O doador não foi aprovado na pré-triagem.');
        }
    }

    public function teste(){

    }

}
