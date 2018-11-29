<?php

namespace App\Models;

//Importações
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; //Pra poder usar DB::select e outros
use App\Models\RegistroDoacao;

class FilaDoadorSangue extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'fila_doadores_sangue'; /* Nome da tabela do banco de dados */

    public function adicionarDoadorFila($registroDoacaoId){
        $filaDoadorSangue = new FilaDoadorSangue;
        $filaDoadorSangue->registro_doacao_id = $registroDoacaoId;
        $filaDoadorSangue->posicao = FilaDoadorSangue::count() + 1;    //Conta quantos doadores tem na fila e o resultado com mais 1 para setar a posição do último adicionado.
        //Created_at é gerado automaticamente
        $filaDoadorSangue->save();
    }

    //Mandando código sql pelo laravel: https://laravel.com/docs/5.0/database | 
    public function carregarFila($quantidade){
        //$doadoresFila = FilaTriagem::all()->take($quantidade); //Take: limita a quantidade de linhas do resultado
        /*Observação: Me parece que ao usar o Eloquent, como o comando: NomeModel::all(); ele retorna um vetor de vetores. Então pra ler eu usava um for each e acessava o vetor dentro do vetor com $nomeVariavel['nomeColuna']. Mas, com 
                      DB:select me parece que ele retorna um vetor de objetos, então, no for each eu acesso usando $nomeVariavel->nomeColuna*/
        $doadoresFila = DB::select('SELECT nome,posicao FROM fila_doadores_sangue inner join registros_doacoes on fila_doadores_sangue.registro_doacao_id = registros_doacoes.id_registro_doacao inner join doadores on registros_doacoes.doador_id = doadores.id_doador');
        if($doadoresFila == null){
            $doadoresFila = "vazia";
        }
        return $doadoresFila;
    }

    public function totalNaFila(){
        $totalFila = FilaDoadorSangue::count();
        return $totalFila;
    }

    public function chamarDoadorFila(){
        $filaDoadorSangue = new FilaDoadorSangue;
        if(($filaDoadorSangue->totalNaFila())>0){
            $dadosDoadorChamado = DB::select('SELECT registro_doacao_id,cpf FROM fila_doadores_sangue inner join registros_doacoes on fila_doadores_sangue.registro_doacao_id = registros_doacoes.id_registro_doacao inner join doadores on registros_doacoes.doador_id = doadores.id_doador where posicao = 1');
            $doador = new Doador;   
            $infosDoador = $doador->buscarInfosDoadorCPF($dadosDoadorChamado[0]->cpf);
            $infosDoador['id_registro_doacao'] = $dadosDoadorChamado[0]->registro_doacao_id;    //Adicionando 'registro_doacao_id' ao vetor
            //print_r($infosDoador); //Dá echo em uma string com informações do vetor. Útil para entender como ele está montado.

            //Deletar doador 1 da fila
            //Atualizar posição dos outros
        } else {
            $infosDoador = "fila vazia";
        }
        
        return $infosDoador;
    }

    public function removerDoadorFila(){

    }

    public function alterarPosicaoDoador(){

    }
}
