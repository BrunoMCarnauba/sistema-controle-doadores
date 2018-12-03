<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistroDoacao;
use App\Models\Doador;
use App\Models\Agendamento;

class AgendamentoController extends Controller
{
    public function agendamentoDoacao(){
        return view ('TelaAgendamento');
    }

    public function agendarDoacao(Request $request){
        $request->validate([
            'tipoDoacao' => 'not_in:"Selecione"',
            'cpfDoador' => 'required|cpf|formato_cpf'
        ]);
        //Só executa o que tem abaixo se tiver passado na validação.
        $agendamento = new Agendamento;
        $data = $request->data."-".$request->horario.":00";   //ANO-MM-DD-HH:MM:SS //OBS: Necessário converter $data para a data no formato ANO-MM-DD
        $agendamento = $agendamento->checarDisponibilidade($data);
        //$agendamento = null;

        if($agendamento != null){
            $registroDoacao = new RegistroDoacao;
            $doador = new Doador;

            //OBS: Falta fazer checagem se já existe doador com o mesmo cpf com registro de doação ativo.
            $doador = $doador->buscarDoadorPorCPF($request->cpfDoador);
            if($doador != null){
                $registroDoacao->doador_id = $doador->id_doador; //Preenchendo model
                $registroDoacao->tipo_doacao = $request->tipoDoacao;
                $registroDoacao->status_registro = "Aguardando data agendada";
                $registroDoacao->save();    //Salvando no banco de dados

                $agendamento->data_agendada = $data;
                $agendamento->registro_doacao_id = $registroDoacao->id; //Pega o ID gerado no salvamento do registro de doação
                $agendamento->save();
            } else {
                return redirect()->route('agendamentoDoacao')->with('erroBusca','Não existe cadastro com o CPF informado.');
            }
        } else {
            return redirect()->route('agendamentoDoacao')->with('erroBusca','Horário ou data não disponível.');
        }
    }


    public function visualizarAgendamentos(){
        return view ('TelaVisualizacaoAgendamentos');
    }

}
