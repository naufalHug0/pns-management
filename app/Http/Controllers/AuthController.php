<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function admin ()
    {
        return view('pages.auth.login', ['role' => 'admin']);
    }

    public function petugas ()
    {
        return view('pages.auth.login', ['role' => 'petugas']);
    }

    public function pegawai ()
    {
        return view('pages.auth.login', ['role' => 'pegawai']);
    }
    public function login (Request $request)
    {
        $validatedData = $request->validate([
            'role'=>'required|in:admin,pegawai,petugas'
        ]);

        $credentials = [
            'nip' => $request->nip,
            'password' => $request->password
        ];

        $role = strtolower($validatedData['role']);

        $user = Pegawai::firstWhere('nip', $credentials['nip']);
            
        if (in_array($role, ['admin','petugas']) && $user->role != $role) {
            return redirect()->back()->with('error', "Akun anda tidak terdaftar sebagai ".ucfirst($role));
        }

        if (Auth::guard($role)->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended("/$role");
        } 
        
        return redirect()->back()->with('error','NIP atau password salah');
    }

    public function logout (Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->withSuccess("Logout successfully!");
    }
}
