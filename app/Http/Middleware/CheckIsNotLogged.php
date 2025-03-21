<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckIsNotLogged
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //checa se o Usuário não está logado, como condição para permitir ir oara as rotas /login e /loginSubmit (se já está logado não permite voltar à tela de login nem submeter uma nova tentativa de auteticação)
        if(session('user')){
            return redirect('/');
        }
        
        return $next($request);
    }
}
