<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectMemberDashboardMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        // $role = $user->role->first()->role_name;

        if ($user->role === 'admin...system' || $user->role === 'director' || $user->role === 'patient') {

            return $next($request);

        } 
        $clinic = \App\Models\Clinic::whereHas('usersClincs', function($query) use ($user) {
            $query->where('user_id', $user->id);
        })->first();

        if ($clinic) {
            return redirect()->route('director.clinic.detail', ['id' => $clinic->id]);
        }
    }
}
