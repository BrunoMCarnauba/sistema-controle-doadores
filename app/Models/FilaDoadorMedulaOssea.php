<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilaDoadorMedulaOssea extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'fila_doadores_medula_ossea'; /* Nome da tabela do banco de dados */

    public function adicionarDoadorFila($registroDoacaoId){
        $filaDoadorMedulaOssea = new FilaDoadorMedulaOssea;
        $filaDoadorMedulaOssea->registro_doacao_id = $registroDoacaoId;
        $filaDoadorMedulaOssea->posicao = FilaDoadorMedulaOssea::all()->count() + 1;
        //Created_at é gerado automaticamente
        $filaDoadorMedulaOssea->save();
    }

    public function carregarFila($quantidade){

    }

    public function removerDoadorFila(){

    }

    public function alterarPosicaoDoador(){
        
    }
}
