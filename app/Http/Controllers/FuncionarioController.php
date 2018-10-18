<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function menu(){
        return view('TelaMenu');
    }

    public function recepcao(){
        return view ('TelaRecepcao');
    }

    public function cadastroFuncionario(){
        return view ('TelaCadastroDoador');
    }

    public function cadastrarFuncionario(Request $request){
        $request->validate([
            'nomeFunc' => 'required|alpha|',
            'cpfFunc' => 'required|cpf|formato_cpf',
            'emailFunc' => 'required|email',
            'telFixoFunc' => 'required_without:telCelFunc|telefone_com_ddd',
            'telCelFunc' => 'required_without:telFixoFunc|celular_com_ddd', /* Só é obrigatório se o campo do telFixo não tiver sido preenchido */
            'dataAdmissaoFunc' => 'date_format:"d/m/Y"',
            'cargoFunc' => 'not_in:"Selecione"', /* Não esteja selecionado a palavra "Selecione" */
            'salarioFunc' => 'required|numeric',
            'cepFunc' => 'required|formato_cep',
            'logradouroFunc' => 'required|alpha',
            'numResidenciaFunc' => 'required|integer',
            'dataNascimentoFunc' => 'required|date_format:"d/m/Y',
            'usuarioFunc' => 'required',
            'senhaFunc' => 'required',
            'confirmaSenhaFunc' => 'required|same:senhaFunc',
            'fotoFuncionario' => 'image'
        ]);
            return redirect()->route('recepcao')->with('notificacao', 'Funcionário cadastrado com sucesso'); /* Só é executado se tiver passado na validação */
    }

}
