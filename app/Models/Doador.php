<?php

namespace App\Models;

//Importações
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; //Pra poder usar DB::select e outros
use App\Models\RegistroDoacao;

class Doador extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'doadores'; // Nome da tabela do banco de dados

    public function calcularIdade($dataNascimento){
        $dataNascimento=explode('-',$dataNascimento); //Separa a data, separando os numeros entre os traços "-"

        $dataAtual=date('Y/m/d'); //Pega a data atual no formato ano/mes/dia
        
        $dataAtual=explode('/',$dataAtual); //Separa a data, separando os numeros entre as barras "/"
        
        $anos = $dataAtual[0]-$dataNascimento[0]; //Encontra a diferença de anos
        
        if($dataNascimento[1] > $dataAtual[1]) //Checa se o mês de nascimento é maior que o mês atual. Se sim, ele retornará a diferença de anos - 1, pois apesar de estar no ano de nascimento, ainda não chegou o mês.      
            return $anos-1;
        
        if($dataNascimento[1] == $dataAtual[1]) //Se o mês de nascimento for igual ao mês atual
            if($dataNascimento[2] <= $dataAtual[2]) { //Ele checa se o dia é menor ou igual ao dia atual. Pois se for, ele já completou ano. Então, basta retornar a diferença de anos.
                return $anos;
            }
            else{ //Se o mês for igual e o dia for menor quer dizer que ainda não completou idade nesse ano. Então retorna a diferença de anos -1.
            return $anos-1;
            }
        
        if ($dataNascimento[1] < $dataAtual[1]) //Se o mês for menor, então ele já completou idade nesse ano. Então retorna a diferença de anos.
            return $anos;
    }

    public function buscarInfosDoadorCPF($cpf){
        $doadorModel = new Doador;
        $doador = Doador::where('cpf', $cpf)->first(); //Busca um único resultado, a linha de determinado cpf.
        
        if($doador!=null){
            $registroDoacao = new RegistroDoacao;
            $vezesDoou = $registroDoacao->vezesDoou($doador->id_doador);

            $idade = $doadorModel->calcularIdade($doador->data_nascimento);

            $infosDoador = array('nome' => $doador->nome, 'idade' => $idade, 'vezesDoou' => $vezesDoou, 'cpf' => $doador->cpf);

            return $infosDoador;
        } else {
            return null;
        }
    }

    public function buscarDoadorPorCPF($cpf){
        $doador = Doador::where('cpf', $cpf)->first(); //Busca um único resultado, a linha de determinado cpf.

        return $doador;
    }

}
