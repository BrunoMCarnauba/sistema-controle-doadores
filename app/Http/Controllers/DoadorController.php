<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doador;
use App\Models\Endereco;
use App\Models\Estado;

class DoadorController extends Controller
{
    public function cadastroDoador(){ /* Configura e chama a tela de cadastro de doadores */
        $estados = new Estado; /* Instanciando o Model */
        $estados = $estados->carregarEstados(); /* Chama o método do model Estados que retorna um vetor com todas as linhas salvas do banco. */

        return view ('TelaCadastroDoador')->with('estados', $estados); /* Chama a view enviando junto a variável estados com os estados */
    }

    public function cadastrarDoador(int $id, Request $request){
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required|cpf|formato_cpf',
            'email' => 'email',
            'telefoneFixo' => 'required_without:telefoneCelular',
            'telefoneCelular' => 'required_without:telefoneFixo', /* Só é obrigatório se o campo do telFixo não tiver sido preenchido */
            'cep' => 'required|formato_cep',
            'estado' => 'not_in:"Selecione"',
            'cidade' => 'not_in:"Selecione',
            'logradouro' => 'required',
            'numeroResidencia' => 'required|integer',
            'dataNascimento' => 'required',
        ]);  
        /* \/ Só é executado se tiver passado na validação \/ */

        $doador = new Doador; /* Instanciando o Model */
        $endereco = new Endereco;

        $doador->cpf = $request->cpf; /* Preenchendo model */
        $doador->nome = $request->nome;
        $doador->email = $request->email;
        $doador->telefone_fixo = $request->telefoneFixo;
        $doador->telefone_celular = $request->telefoneCelular;
        $doador->data_nascimento = $request->dataNascimento;
        $doador->endereco_id = Endereco::create(['cep' => $request->cep, 'estado' => $request->estado, 'cidade' => $request->cidade, 'logradouro' => $request->logradouro, 'numero_residencia' => $request->numeroResidencia, 'complemento' => $request->complemento])->id; // Usando esse método "Modelo::create([]) ele salva e retorna a chave primária"
        $doador->sexo = $request->sexo;
        $doador->tipo_sanguineo = $request->tipoSanguineo;
        $doador->fator_Rh = $request->fatorRh;
        
        $doador->save(); /* Salva no banco de dados */

        if($id == 1){
            return redirect()->route('recepcao')->with('notificacao', 'Doador cadastrado com sucesso');
        } else{
            return redirect()->route('registroDoacao')->with('notificacao', 'Doador cadastrado com sucesso');
        }
    }

}