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
            $request->session()->put('usuario', 'Teste'); /*“variável” que se manterá ativa mesmo ao mudar de página ou sair da página. */
           return redirect()->route('menu'); /* Redireciona para a rota de nome 'menu'. */
        } else {
            return redirect()->route('login')->with('erro','Usuário ou senha inválido'); /* Redireciona para determinada rota e envia junto a variável erro com sua descrição para a página*/
        }
    }

    public function logout(Request $request){
        $request->session()->flush(); /*Apaga todos os dados da sessão*/
        return redirect('login'); /*redirect ao invés de return view para também mudar o endereço da página. Ao invés de ficar /logout na página de login */
    }

    
}
