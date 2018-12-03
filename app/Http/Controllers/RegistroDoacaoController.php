<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroDoacao;
use App\Models\Doador;
use App\Models\FilaTriagem;

class RegistroDoacaoController extends Controller
{
    public function registroDoacao(){
        return view ('TelaRegistroDoacao');
    }

    public function buscarDoador($cpf){ //Ativado por uma função no javaScript RegistroDoacao
        //Preenche o campo de informação do doador com os dados do doador do respectivo cpf
        $doador = new Doador;
        $infosDoador = $doador->buscarInfosDoadorCPF($cpf);
        
        if($infosDoador != null){
            // devolvendo a linha HTML para o javascript montar no append
            echo "<p>Nome: " . $infosDoador['nome'] . "</p>";
            echo "<p>Idade: " . $infosDoador['idade'] . " ano(s)</p>";
            echo "<p>Doou " . $infosDoador['vezesDoou'] . " vez(es)</p>";
        }else{
            echo "erro";
        }
    }

    public function registrarDoacao(Request $request){
        $request->validate([
            'tipoDoacao' => 'not_in:"Selecione"',
            'cpfDoador' => 'required|cpf|formato_cpf'
        ]);
        //Só executa o que tem abaixo se tiver passado na validação.
        $registroDoacao = new RegistroDoacao;
        $doador = new Doador;

        //OBS: Falta fazer checagem se já existe doador com o mesmo cpf com registro de doação ativo.
        $doador = $doador->buscarDoadorPorCPF($request->cpfDoador);
        if($doador != null){
            $registroDoacao->doador_id = $doador->id_doador; //Preenchendo model
            $registroDoacao->tipo_doacao = $request->tipoDoacao;
            $registroDoacao->status_registro = "Aguardando pré-triagem";
            $registroDoacao->save();    //Salvando no banco de dados

            if($registroDoacao->tipo_doacao == "Doação de sangue"){ //Colocando na fila de espera para triagem
                $filaTriagem = new FilaTriagem; //Instanciando Model
                $filaTriagem->adicionarDoadorFila($registroDoacao->id); //Adicionando doador de determinado registro de doação à fila

                return redirect()->route('recepcao')->with('notificacao','Doação registrada com sucesso.');
            } else { //Se for doação de medula óssea deve agendar
                //Redirecionando para a tela de agendamento
                return redirect()->route('recepcao')->with('notificacao','Necessário agendar doação.');
            }
        } else {
            return redirect()->route('registroDoacao')->with('erroBusca','Não existe cadastro com o CPF informado.');
        }

        /* Precisa fazer a div aumentar a altura automaticamente, pra poder por: return redirect()->route('recepcao')->with('notificacao','Doação registrada com sucesso.<br/>Doador adicionado à fila de espera para triagem.'); */
    }

}
