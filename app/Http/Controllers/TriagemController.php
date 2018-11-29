<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Triagem;

class TriagemController extends Controller
{
    public function triagem(){
        return view ('TelaTriagem');
    }

    public function aprovarTriagem(Request $request){
        $registroDoacao = new RegistroDoacao;
        $registroDoacao = $registroDoacao->buscarRegistroDoacao($id_registro_doacao);
        $triagem->doador_id = $registroDoacao->doador_id;
        $triagem->aprovacao = "true";
        $triagem->observacoes = $request->observacoes;

        return redirect()->route('recepcao')->with('notificacao', 'Triagem registrada. Doador aprovado.');
    }

    public function reprovarTriagem(Request $request){
        $registroDoacao = new RegistroDoacao;
        $registroDoacao = $registroDoacao->buscarRegistroDoacao($id_registro_doacao);
        $triagem->doador_id = $registroDoacao->doador_id;
        $triagem->aprovacao = "false";
        $triagem->observacoes = $request->observacoes;

        return redirect()->route('recepcao')->with('notificacao', 'Triagem registrada. Doador reprovado.');
    }
}
