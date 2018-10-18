<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(){
        return view ('TelaLogin');
    }

    public function logar(Request $request){
        if($request->usuarioLogin == 'Teste' && $request->senhaLogin == '123'){
           return redirect()->route('menu');
        } else {
            return redirect()->route('login')->with('erro','Usuário ou senha inválido'); /* Redireciona para determinada rota e envia junto a variável erro com sua descrição para a página*/
        }
    }

    
}
