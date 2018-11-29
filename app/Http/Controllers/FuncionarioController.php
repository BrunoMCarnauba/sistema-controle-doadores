<?php

namespace App\Http\Controllers;

/* Importações */
use Illuminate\Http\Request;
use App\Models\Funcionario;
use App\Models\Cargo;
use App\Models\Endereco;
use App\Models\Estado;

class FuncionarioController extends Controller
{
    public function menu(){
        return view ('TelaMenu');
    }

    public function cadastroFuncionario(){ /* Configura e chama a tela de cadastro de funcionários */
        $cargos = new Cargo; /* Instanciando o Model */
        $cargos = $cargos->carregarCargos(); /* Chama o método do model Cargos que retorna um vetor com todas as linhas salvas do banco. */
        $estados = new Estado;
        $estados = $estados->carregarEstados();

        return view('TelaCadastroFuncionario')->with('cargos', $cargos)->with('estados', $estados); /* Chama a view com as variáveis cargos e estados */
    }

    public function cadastrarFuncionario(Request $request){
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|cpf|formato_cpf',
            'email' => 'required|email',
            'telefoneFixo' => 'required_without:telefoneCelular',
            'telefoneCelular' => 'required_without:telefoneFixo', /* Só é obrigatório se o campo do telFixo não tiver sido preenchido */
            'dataAdmissao' => 'required',
            'cargo' => 'not_in:"Selecione"', /* Não esteja selecionado a palavra "Selecione" */
            'cep' => 'required|formato_cep',
            'estado' => 'not_in:"Selecione"',
            'cidade' => 'not_in:"Selecione',
            'logradouro' => 'required|',
            'numeroResidencia' => 'required|integer',
            'dataNascimento' => 'required',
            'usuario' => 'required',
            'senha' => 'required',
            'confirmaSenha' => 'required|same:senha',
            'fotoFuncionario' => 'image'
        ]);

            $funcionario = new Funcionario; /* Instanciando o Model */
            $cargo = new Cargo;
            $endereco = new Endereco;

            $funcionario->cpf = $request->cpf;
            $funcionario->nome = $request->nome;
            $funcionario->email = $request->email;
            $funcionario->telefone_fixo = $request->telefoneFixo;
            $funcionario->telefone_celular = $request->telefoneCelular;
            $funcionario->data_nascimento = $request->dataNascimento;
            $funcionario->data_admissao = $request->dataAdmissao;
            $funcionario->cargo_id = $request->cargo; // O "value" na tag select no html já está com o id do cargo.
            $funcionario->endereco_id = Endereco::create(['cep' => $request->cep, 'estado' => $request->estado, 'cidade' => $request->cidade, 'logradouro' => $request->logradouro, 'numero_residencia' => $request->numeroResidencia, 'complemento' => $request->complemento])->id; // Usando esse método "Modelo::create([]) ele salva e retorna a chave primária"
            $funcionario->sexo = $request->sexo;
            $funcionario->usuario = $request->usuario;
            $funcionario->senha = $request->senha;
            $funcionario->foto = $request->fotoFuncionario;
            
            $funcionario->save(); /* Salva no banco de dados */

            return redirect()->route('recepcao')->with('notificacao', 'Funcionário cadastrado com sucesso'); /* Só é executado se tiver passado na validação */
    }

}

/* 
            'nomeFunc' => 'required|alpha|',
            'cpfFunc' => 'required|cpf|formato_cpf',
            'emailFunc' => 'required|email',
            'telFixoFunc' => 'required_without:telCelFunc|telefone_com_ddd',
            'telCelFunc' => 'required_without:telFixoFunc|celular_com_ddd', Só é obrigatório se o campo do telFixo não tiver sido preenchido
            'dataAdmissaoFunc' => 'date_format:"d/m/Y"',
            'cargoFunc' => 'not_in:"Selecione"', Não esteja selecionado a palavra "Selecione"
            'salarioFunc' => 'required|numeric',
            'cepFunc' => 'required|formato_cep',
            'logradouroFunc' => 'required|alpha',
            'numResidenciaFunc' => 'required|integer',
            'dataNascimentoFunc' => 'required|date_format:d/m/Y',
            'usuarioFunc' => 'required',
            'senhaFunc' => 'required',
            'confirmaSenhaFunc' => 'required|same:senhaFunc',
            'fotoFuncionario' => 'image'

*/