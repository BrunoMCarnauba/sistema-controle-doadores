<?php

namespace App\Http\Controllers;

//Importações
use Illuminate\Http\Request;
use App\Models\FilaTriagem;
use App\Models\FilaDoadorSangue;
use App\Models\FilaDoadorMedulaOssea;

class RecepcaoController extends Controller
{
    public function recepcao(){
        //OBS: Falta implementar paginação (Com apenas 2 setinhas < > e com a cor vermelha)

        //Carregar fila de espera para triagem
        $filaTriagem = new FilaTriagem;
        $filaTriagem = $filaTriagem->carregarFila(3);    //Recebe um vetor com os ['doadores'] e o total ['total']
        //Carregar fila de espera para doação de sangue
        $filaDoadorSangue = new FilaDoadorSangue;
        //$filaDoadorSangue = $filaDoadorSangue->carregarFila(3);  //Recebe um vetor com os ['doadores'] e o total ['total']
        //Carregar fila de espera para doação de medula óssea
        $filaDoadorMedulaOssea = new FilaDoadorMedulaOssea;
        //$filaDoadorSangue = $filaDoadorSangue->carregarFila(3);  //Recebe um vetor com os ['doadores'] e o total ['total']

        return view ('TelaRecepcao')->with('filaTriagem', $filaTriagem)->with('filaDoadorSangue', $filaDoadorSangue)->with('filaDoadorMedulaOssea', $filaDoadorMedulaOssea);
    }
}
