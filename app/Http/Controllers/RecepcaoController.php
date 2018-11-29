<?php

namespace App\Http\Controllers;

//Importações
use Illuminate\Http\Request;
use App\Models\FilaTriagem;
use App\Models\FilaDoadorSangue;
use App\Models\FilaDoadorMedulaOssea;

class RecepcaoController extends Controller
{
    public function recepcao(){
        return view ('TelaRecepcao');
    }

    public function chamarDoadorTriagem(){
        $filaTriagem = new FilaTriagem;
        $infosDoador = $filaTriagem->chamarDoadorFila();

        if($infosDoador != "fila vazia"){
            session()->put('infosDoador',$infosDoador); //Manterá uma sessão de infosDoador no sistema. Ela continuará mesmo se houver ocorrido um erro no registro da pré-triagem e a página tiver sido atualizada.
            return redirect()->route('pre-triagem');
            //return redirect()->route('pre-triagem')->with('infosDoador', $infosDoador);
        } else {
            return redirect()->route('recepcao')->with('notificacao', 'A fila de triagem está vazia!');
        }
    }

    public function chamarDoadorSangue(){
        $filaDoadorSangue = new FilaDoadorSangue;
        $filaDoadorSangue->chamarDoadorFila();
        return redirect()->route('recepcao')->with('notificacao', 'Doador de sangue chamado!');
    }

    public function chamarDoadorMedulaOssea(){
        $filaDoadorMedulaOssea = new FilaDoadorMedulaOssea;
        $filaDoadorMedulaOssea->chamarDoadorFila();
        return redirect()->route('recepcao')->with('notificacao', 'Doador de medula óssea chamado!');
    }

}
