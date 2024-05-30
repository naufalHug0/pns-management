<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Guest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        foreach (['admin', 'pegawai', 'petugas'] as $guard) {
            if (Auth::guard($guard)->check()) {
                return redirect("/$guard")->with('error', 'You are already logged in.');
            }
        }

        return $next($request);
    }
}
