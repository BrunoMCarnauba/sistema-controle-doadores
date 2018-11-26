<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cidade;


class CidadeController extends Controller
{
    public function carregarCidades($siglaEstado){ // Ativado por uma função no javaScript
        $cidades = new Cidade;
        $cidades = $cidades->carregarCidades($siglaEstado);

        //faz um loop para montar linha por linha da combo de cidade
        foreach ($cidades as $cidade) {
            // devolvendo a linha HTML para o javascript montar no append
            echo "<option value='" . $cidade->nome . "' >" . $cidade->nome . "</option>"; //Outra forma de fazer
            //$stringCidades = $stringCidades . "<option value=\"$cidade->nome\">$cidade->nome</option>"; //Forma 2 de fazer
        }

        //return $stringCidades; //Forma 2 de fazer
    }
}
