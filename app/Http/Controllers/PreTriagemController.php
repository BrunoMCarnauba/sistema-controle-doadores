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

    public function registrarPreTriagem($id_registro_doacao, Request $request){
        $request->validate([
            'pressaoArterial' => 'required',
            'temperaturaCorporal' => 'required',
            'peso' => 'required',
            'altura' => 'required',
            'pulso' => 'required'
        ]);
        //Se passar na validação ele executa o código abaixo.
        $preTriagem = new PreTriagem;
        $registroDoacao = new RegistroDoacao;
        $registroDoacao = $registroDoacao->buscarRegistroDoacao($id_registro_doacao);
        $preTriagem->doador_id = $registroDoacao->doador_id;
        $preTriagem->pressao_arterial = $request->pressaoArterial;
        $preTriagem->temperatura_corporal = $request->temperaturaCorporal;
        $preTriagem->peso = $request->peso;
        $preTriagem->altura = $request->altura;
        $preTriagem->pulso = $request->pulso;
        
        $resultado = $preTriagem->registrarPreTriagem($preTriagem,$id_registro_doacao);

        $infosDoador = $registroDoacao->buscarInfosDoador($id_registro_doacao);

        if($resultado == ""){
            return redirect()->route('triagem')->with('infosDoador', $infosDoador)->with('notificacao', 'Pré-triagem registrada com sucesso.');
        } else {
            return redirect()->route('recepcao')->with('notificacao', 'O doador não foi aprovado na pré-triagem.');
        }
    }

}
