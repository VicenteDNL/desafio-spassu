<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AuthenticateMiddleware
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if (!$user) {
            return  redirect()->route('dashboard')->with('info', 'Você precisa se autenticar para acessar esta pagina');
        }
        return $next($request);

    }
}
