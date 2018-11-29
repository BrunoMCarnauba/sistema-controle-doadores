<?php

namespace App\Models;

//Importações
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; //Pra poder usar DB::select e outros
use App\Models\RegistroDoacao;
use App\Models\Doador;

class FilaTriagem extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'fila_doadores_triagem'; /* Nome da tabela do banco de dados */

    public function adicionarDoadorFila($registroDoacaoId){
        $filaTriagem = new FilaTriagem;
        $filaTriagem->registro_doacao_id = $registroDoacaoId;
        $filaTriagem->posicao = FilaTriagem::count() + 1;    //Conta quantos doadores tem na fila e o resultado com mais 1 para setar a posição do último adicionado.
        //Created_at é gerado automaticamente
        $filaTriagem->save();
    }

    //Mandando código sql pelo laravel: https://laravel.com/docs/5.0/database | 
    public function carregarFila($quantidade){
        //$doadoresFila = FilaTriagem::all()->take($quantidade); //Take: limita a quantidade de linhas do resultado
        /*Observação: Me parece que ao usar o Eloquent, como o comando: NomeModel::all(); ele retorna um vetor de vetores. Então pra ler eu usava um for each e acessava o vetor dentro do vetor com $nomeVariavel['nomeColuna']. Mas, com 
                      DB:select me parece que ele retorna um vetor de objetos, então, no for each eu acesso usando $nomeVariavel->nomeColuna*/
        $doadoresFila = DB::select('SELECT nome,posicao FROM fila_doadores_triagem inner join registros_doacoes on fila_doadores_triagem.registro_doacao_id = registros_doacoes.id_registro_doacao inner join doadores on registros_doacoes.doador_id = doadores.id_doador');
        if($doadoresFila == null){
            $doadoresFila = "vazia";
        }
        return $doadoresFila;
    }

    public function totalNaFila(){
        $totalFila = FilaTriagem::count();
        return $totalFila;
    }

    public function chamarDoadorFila(){
        $filaTriagem = new FilaTriagem;
        if(($filaTriagem->totalNaFila())>0){
            $dadosDoadorChamado = DB::select('SELECT registro_doacao_id,cpf,tipo_doacao FROM fila_doadores_triagem inner join registros_doacoes on fila_doadores_triagem.registro_doacao_id = registros_doacoes.id_registro_doacao inner join doadores on registros_doacoes.doador_id = doadores.id_doador where posicao = 1');
            $doador = new Doador;   
            $infosDoador = $doador->buscarInfosDoadorCPF($dadosDoadorChamado[0]->cpf);
            $infosDoador['id_registro_doacao'] = $dadosDoadorChamado[0]->registro_doacao_id;    //Adicionando 'registro_doacao_id' ao vetor
            $infosDoador['tipo_doacao'] = $dadosDoadorChamado[0]->tipo_doacao;    //Adicionando 'registro_doacao_id' ao vetor
            //print_r($infosDoador); //Dá echo em uma string com informações do vetor. Útil para entender como ele está montado.
            $filaTriagem->removerDoadorFila(1); //Deleta o primeiro da fila e atualiza as posições.
        } else {
            $infosDoador = "fila vazia";
        }
        
        return $infosDoador;
    }

    public function removerDoadorFila($posicao){
        DB::delete('delete from fila_doadores_triagem where posicao = ?',[$posicao]);   //Deleta da fila o doador de determinada posição
        DB::update('Update fila_doadores_triagem set posicao = posicao-1 where posicao > ?',[$posicao]);  //Ajusta as posições: 3º vai pra segundo, 2º vai pra primeiro, e assim vai...
    }

    public function alterarPosicaoDoador(){

    }

}
