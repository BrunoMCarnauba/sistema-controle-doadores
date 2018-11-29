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
            return redirect()->route('pre-triagem')->with('infosDoador', $infosDoador);
        } else {
            return redirect()->route('recepcao')->with('notificacao', 'A fila de triagem está vazia!');
        }
    }

    public function chamarDoadorSangue(){

    }

    public function chamarDoadorMedulaOssea(){

    }

}
