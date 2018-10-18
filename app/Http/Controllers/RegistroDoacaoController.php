<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegistroDoacaoController extends Controller
{
    public function registroDoacao(){
        return view ('TelaRegistroDoacao');
    }

    public function buscarDoador(Request $request){
        $request->validate([
            'cpfDoador' => 'required|cpf|formato_cpf'
        ]);
        /* Preenche o campo de informação do doador com os dados do doador do respectivo cpf */
    }

    public function registrarDoacao(){
        return redirect()->route('recepcao')->with('notificacao','Doação registrada com sucesso.<br/>Doador adicionado à fila de espera para triagem.');
    }

}
