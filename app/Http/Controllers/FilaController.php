<?php

namespace App\Http\Controllers;

//Importações
use Illuminate\Http\Request;
use App\Models\FilaTriagem;
use App\Models\FilaDoadorSangue;
use App\Models\FilaDoadorMedulaOssea;

class FilaController extends Controller
{
    public function carregarFila($tipo, $quantidade){
        //OBS: Falta implementar paginação (Com apenas 2 setinhas < > e com a cor vermelha)

        //Qual fila é pra carregar
        switch ($tipo) {
            case '1':
                $fila = new FilaTriagem;
                break;
            case '2':
                $fila = new FilaDoadorSangue;
                break;
            case '3':
                $fila = new FilaDoadorMedulaOssea;
                break;
            default:
                $fila = "invalido";
                break;
        }

        if($fila!="invalido"){
            $doadoresFila = $fila->carregarFila($quantidade);    //Recebe um vetor com os ['doadores'] e o total ['total']
            $totalFila = $fila->totalNaFila();

            $contaImpressoes = 0;
            if($doadoresFila != "vazia"){
                foreach ($doadoresFila as $doadores) {
                    $contaImpressoes++;
                    echo "<p>".$doadores->posicao." - ".$doadores->nome."</p>";
                }
                if($totalFila < 3){ //Geralmente quando é 3, está sendo carregando as filas dos pequenos retângulos. Então, é completado com mais parágrafos por questão de aparência no html.
                    for($i=$contaImpressoes; $i<$totalFila; $i++){
                        echo "<p></p>";
                    }
                }
                echo "<p style=\"text-align: right; margin-right: 5px;\">Total: ".$totalFila."</p>";
            } else {
                echo "vazia";
            }
        }
    }

    public function totalFila($tipo){
        //Qual fila é pra carregar
        switch ($tipo) {
            case '1':
                $fila = new FilaTriagem;
                break;
            case '2':
                $fila = new FilaDoadorSangue;
                break;
            case '3':
                $fila = new FilaDoadorMedulaOssea;
                break;
            default:
                $fila = "invalido";
                break;
        }

        $qtdFila = $fila->totalNaFila();
        return $qtdFila;
    }

}