<?php

namespace App\Http\Middleware;

use App\Models\CheckAccount;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAccountMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        if ($user) {
            // Récupérer l'utilisateur connecté
            $checkAccount = CheckAccount::where('asker_id', $user->id)->first();
        
            // Vérifier si le compte est activé ou si l'utilisateur est un administrateur
            if (($checkAccount && $checkAccount->actived === 'validated') || $user->role === 'admin...system') {
                return $next($request);
            }
        }

        $message = "Votre compte n'est pas activé. Veuillez l'activer.<br>
                    Si vous avez déjà soumis vos infos, veuillez patienter.
                    sinon veuillez le faire 
                    <span class='font-bold underline'>
                    <a href=\"/director/complet/infos\">ici</a>
                    </span>
                    ";
        return abort(403, $message);
        
    }
}
