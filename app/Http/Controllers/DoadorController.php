<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DoadorController extends Controller
{
    public function cadastroDoador(){
        return view ('TelaCadastroDoador');
    }

    public function cadastrarDoador(Request $request,int $id){
        $request->validate([
            'nomeDoador' => 'required|alpha|',
            'cpfDoador' => 'required|cpf|formato_cpf',
            'emailDoador' => 'email',
            'telFixoDoador' => 'required_without:telCelDoador|telefone_com_ddd',
            'telCelDoador' => 'required_without:telFixoDoador|celular_com_ddd', /* Só é obrigatório se o campo do telFixo não tiver sido preenchido */
            'cepDoador' => 'required|formato_cep',
            'logradouroDoador' => 'required|alpha',
            'numResidenciaDoador' => 'required|integer',
            'dataNascimentoDoador' => 'required|date_format:"d/m/Y',
        ]);  
        /* \/ Só é executado se tiver passado na validação \/ */
        if($id == 1){
            return redirect()->route('recepcao')->with('notificacao', 'Doador cadastrado com sucesso');
        } else{
            return redirect()->route('registroDoacao')->with('notificacao', 'Doador cadastrado com sucesso');
        }
    }
}
