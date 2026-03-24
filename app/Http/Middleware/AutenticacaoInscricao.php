<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\Inscricao;

class AutenticacaoInscricao
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if(Auth::user()->temInscricaoCompleta()){
            return redirect('/perfil')->with('error', 'Você já está inscrito!');
        }else{
            return redirect('/pagamento/retomar');
        }
        
        return $next($request);
    }
}
