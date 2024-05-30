<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ValidateUnitKerja
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
        $theUser = Auth::guard($role)->user()->load('jabatan.unit_kerja');

        $requested_user = Pegawai::with('jabatan.unit_kerja')->find($request_id);

        if ($requested_user) {
            if ($theUser->jabatan->unit_kerja_id == $requested_user->jabatan->unit_kerja_id) {
                return $next($request);
            } 
            return abort(403);
        }

        return abort(404);
    }
}
