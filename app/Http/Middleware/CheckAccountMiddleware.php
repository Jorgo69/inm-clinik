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
        $user = auth()->user();
        if($user)
        {
            // recuperer le user connecter
            $checkAccount = CheckAccount::where('asker_id', $user->id)->first();
            if($checkAccount && $checkAccount->actived === 'validator')
            {
                return $next($request);
            }
        }

        return abort(403, 'Votre compte n\'est pas active veuillez l\'activer');
        
    }
}
