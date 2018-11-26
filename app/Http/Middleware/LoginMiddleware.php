<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!session('usuario')){ /*Se não existir sessão ativa, então não está logado*/
            return redirect()->route('login')->with('erro','Você precisa efetuar o login primeiro'); /*Redireciona para a rota login enviando um erro*/
        }
        return $next($request);
    }
}
