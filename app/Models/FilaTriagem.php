<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilaTriagem extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'fila_doadores_triagem'; /* Nome da tabela do banco de dados */

    public function adicionarDoadorFila($registroDoacaoId){
        $filaTriagem = new FilaTriagem;
        $filaTriagem->registro_doacao_id = $registroDoacaoId;
        $filaTriagem->posicao = FilaTriagem::all()->count() + 1;    //Conta quantos doadores tem na fila e o resultado com mais 1 para setar a posição do último adicionado.
        //Created_at é gerado automaticamente
        $filaTriagem->save();
    }

    public function carregarFila($quantidade){
        $filaTriagem['doadores'] = FilaTriagem::limit($quantidade)->orderby('posicao','asc');
        $filaTriagem['total'] = FilaTriagem::all()->count();

        return $filaTriagem;
    }

    public function removerDoadorFila(){

    }

    public function alterarPosicaoDoador(){

    }

}
