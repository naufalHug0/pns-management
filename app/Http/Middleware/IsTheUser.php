<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsTheUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $role = explode('/', request()->path())[0];
        $request_id = array_reverse(explode('/', request()->path()))[0];
        
        if (Auth::guard($role)->user()->id == $request_id) {
            return $next($request);
        }

        return abort(403);
    }
}
