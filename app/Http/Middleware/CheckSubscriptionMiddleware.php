<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckSubscriptionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();
        
        // Récupérer les cliniques de l'utilisateur
        $clinics = $user->clinics; // Assurez-vous que la relation est définie dans le modèle User

        foreach ($clinics as $clinic) {
            $owner = $clinic->adder; // Assurez-vous que la relation est définie dans le modèle Clinic

            // Vérifier si l'abonnement du propriétaire est actif
            $activeSubscription = $owner->subscriptions()
                ->where('end_date', '>=', Carbon::now())
                ->orderBy('end_date', 'desc')
                ->first();

            if (!$activeSubscription) {
                // Si l'abonnement n'est pas actif, rediriger vers une page d'expiration
                return redirect()->route('subscription.expired');
            }
        }
        return $next($request);
    }
}
