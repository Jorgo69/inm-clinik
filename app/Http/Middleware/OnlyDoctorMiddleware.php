<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class OnlyDoctorMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $doctor = auth()->user()->role;

        if($doctor == 'member-doctor')
        {
            return $next($request);
        }

        return back()->with('error', 'Vous n\'avez pas les permissions pour effectuer cette action ');
    }
}
