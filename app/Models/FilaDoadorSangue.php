<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FilaDoadorSangue extends Model
{
    /* O model está vinculado a uma tabela do banco. Seus atributos são as colunas da tabela. */
    protected $table = 'fila_doadores_sangue'; /* Nome da tabela do banco de dados */

    public function adicionarDoadorFila($registroDoacaoId){
        $filaDoadorSangue = new FilaDoadorSangue;
        $filaDoadorSangue->registro_doacao_id = $registroDoacaoId;
        $filaDoadorSangue->posicao = FilaDoadorSangue::all()->count() + 1;
        //Created_at é gerado automaticamente
        $filaDoadorSangue->save();
    }

    public function carregarFila($quantidade){
        
    }

    public function removerDoadorFila(){

    }

    public function alterarPosicaoDoador(){
        
    }
}
