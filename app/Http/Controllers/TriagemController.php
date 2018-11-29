<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Triagem;
use App\Models\FilaDoadorSangue;
use App\Models\FilaDoadorMedulaOssea;

class TriagemController extends Controller
{
    public function triagem(){
        return view ('TelaTriagem');
    }

    public function registrarTriagem(Request $request){
        $triagem = new Triagem;
        $id_registro_doacao = $request->session()->get('infosDoador')['id_registro_doacao']; //Pega o id_registro_doacao que está na sessão infosDoador 
        $id_doador = $request->session()->get('infosDoador')['id_doador']; //Pega o id_doador que está na sessão infosDoador 
        $triagem->doador_id = $id_doador;
        $triagem->observacoes = $request->observacoes;

        if($request->aprovacao == "Aprovar"){
            $triagem->aprovacao = true;
            $triagem->registrarTriagem($triagem,$id_registro_doacao);

            $tipoDoacao = $request->session()->get('infosDoador')['tipo_doacao'];

            if($tipoDoacao == "Doação de sangue"){
                $filaDoadorSangue = new FilaDoadorSangue;
                $filaDoadorSangue->adicionarDoadorFila($id_registro_doacao);
            } else if ($tipoDoacao == "Doação de medula óssea"){
                $filaDoadorMedulaOssea = new FilaDoadorMedulaOssea;
                $filaDoadorMedulaOssea->adicionarDoadorFila($id_registro_doacao);
            }
    
            $request->session()->forget('infosDoador'); //A sessão infosDoador é apagada, pois não precisará usá-la na próxima página
            return redirect()->route('recepcao')->with('notificacao', 'Triagem registrada. Doador aprovado.');    
        } else if ($request->aprovacao == "Reprovar"){
            $triagem->aprovacao = false;
            $triagem->registrarTriagem($triagem,$id_registro_doacao);        
    
            $request->session()->forget('infosDoador'); //A sessão infosDoador é apagada, pois não precisará usá-la na próxima página
            return redirect()->route('recepcao')->with('notificacao', 'Triagem registrada. Doador reprovado.');
        }
    }
}
