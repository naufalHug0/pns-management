<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Agama;
use App\Models\Jabatan;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePegawaiRequest;
use App\Http\Requests\UpdatePegawaiRequest;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $role = explode('/', request()->path())[0];
        $user = Auth::guard($role)->user()->load('jabatan.unit_kerja');

        $limit = 5;
        $page = request()->get('page') ?? 1;
        $offset = intval($page) * $limit;
        
        $pegawais = Pegawai::with(['agama','jabatan','jabatan.eselon','jabatan.unit_kerja','jabatan.unit_kerja.tempat_tugas','golongan'])->filter(request(['search','unit-kerja']));

        if ($user->role != 'admin') {
            $pegawais = $pegawais->whereHas('jabatan.unit_kerja', function ($pegawai) use ($user) {
                return $pegawai->where('jabatan.unit_kerja_id', $user->jabatan->unit_kerja_id);
            });
        }

        return view('pages.dashboard.pegawai.index', [
            'title'=>'Dashboard',
            'user'=>$user,
            'total_page'=>ceil($pegawais->count() / $limit),
            'pegawais'=>$pegawais->skip($offset)->paginate($limit),
            'unit_kerjas'=>UnitKerja::all(),
            'limit'=>$limit,
            'page'=>$page
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = explode('/', request()->path())[0];
        $user = Auth::guard($role)->user()->load('jabatan.unit_kerja');
        $unit_kerjas = UnitKerja::with(['jabatan', 'tempat_tugas', 'jabatan.eselon']);

        if ($role == 'petugas') {
            $unit_kerjas = $unit_kerjas->where('id', $user->jabatan->unit_kerja_id);
        }

        return view('pages.dashboard.pegawai.create', [
            'title'=>'Tambah Pegawai',
            'agamas'=>Agama::all(),
            'user'=>$user,
            'unit_kerjas'=>$unit_kerjas->get(),
            'golongans'=>Golongan::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
                'nama'=>'required|string',
                'nip'=>'required|string|max:11',
                'npwp'=>'required|string|max:25',
                'password'=>'required|string',
                'no_hp'=>'required|string',
                'alamat'=>'required|string',
                'tanggal_lahir'=>'required|date',
                'tempat_lahir'=>'required|string',
                'jenis_kelamin'=>'required|string|in:L,P',
                'role'=>'required|string|in:pegawai,petugas,admin',
                'foto_profil'=>'file|mimetypes:image/*',
                'agama_id'=>'required',
                'golongan_id'=>'required',
                'jabatan_id'=>'required',
            ],[
            'required'=>'Kolom harus diisi'
        ]);

        if (isset($validatedData['foto_profil'])) {
            $validatedData['foto_profil'] = $request->foto_profil->store('profil-pegawai');
        }

        $validatedData['password'] = Hash::make($validatedData['password']);

        Pegawai::create($validatedData);

        $role = explode('/', request()->path())[0];

        return redirect("/$role")->with('notification', [
            'type'=>'success',
            'message'=>'Pegawai berhasil ditambah!',
            'options'=>[
                [ 'text'=>'Lanjut', 'type'=>'primary' ]
            ]
        ]);
    }

    public function print()
    {
        $role = explode('/', request()->path())[0];
        $user = Auth::guard($role)->user()->load('jabatan.unit_kerja');

        if ($user->role == 'petugas') {
            request()->merge(["unit-kerja" => $user->jabatan->unit_kerja_id]);
        }

        $pegawais = Pegawai::with(['agama','jabatan','jabatan.eselon','jabatan.unit_kerja','jabatan.unit_kerja.tempat_tugas','golongan'])->filter(request(['search','unit-kerja']));

        return view('pages.dashboard.layouts.print', [
            'user'=>$user,
            'pegawais'=>$pegawais->get(),
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $role = explode('/', request()->path())[0];
        $user = Auth::guard($role)->user()->load(['agama','jabatan','jabatan.eselon','jabatan.unit_kerja','jabatan.unit_kerja.tempat_tugas','golongan']);

        return view('pages.dashboard.profile.edit', [
            'title'=>'Edit Profil',
            'user'=>$user,
            'agamas'=>Agama::all(),
            'unit_kerjas'=>UnitKerja::with(['jabatan','tempat_tugas','jabatan.eselon'])->get(),
            'golongans'=>Golongan::all(),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $role = explode('/', request()->path())[0];
        $user = Auth::guard($role)->user();

        if ($pegawai = Pegawai::with(['agama','jabatan','jabatan.eselon','jabatan.unit_kerja','jabatan.unit_kerja.tempat_tugas','golongan'])->find($id)) {
            return view('pages.dashboard.pegawai.edit', [
                'title'=>'Edit Pegawai',
                'agamas'=>Agama::all(),
                'user'=>$user,
                'pegawai'=>$pegawai,
                'unit_kerjas'=>UnitKerja::with(['jabatan','tempat_tugas','jabatan.eselon'])->get(),
                'golongans'=>Golongan::all(),
            ]);
        }

        return abort(404);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $role = explode('/', request()->path())[0];

        $rules = [
            'nama'=>'required|string',
            'nip'=>'required|string|max:11',
            'npwp'=>'required|string|max:25',
            'no_hp'=>'required|string',
            'alamat'=>'required|string',
            'tanggal_lahir'=>'required|date',
            'tempat_lahir'=>'required|string',
            'jenis_kelamin'=>'required|string|in:L,P',
            'foto_profil'=>'file|mimetypes:image/*',
            'agama_id'=>'required',
        ];

        if ($role != 'pegawai') {
            $rules = array_merge($rules, [
                'role'=>'required|string|in:pegawai,petugas,admin',
                'golongan_id'=>'required',
                'jabatan_id'=>'required',
            ]);
        }

        if ($pegawai = Pegawai::find($id)) {
            $validatedData = $request->validate($rules,[
                'required'=>'Kolom harus diisi'
            ]);

            if (isset($validatedData['foto_profil'])) {
                $validatedData['foto_profil'] = $request->foto_profil->store('profil-pegawai');
            }

            if ($request->password) {
                $validatedData['password'] = Hash::make($request->password);
            }

            $pegawai->update($validatedData);

            return redirect()->back()->with('notification', [
                'type'=>'success',
                'message'=>"Data berhasil diubah!",
                'options'=>[
                    [ 'text'=>'Lanjut', 'type'=>'primary' ]
                ]
            ]);
        } 
        return abort(404);
    }

    public function delete(Request $request) {
        $role = explode('/', request()->path())[0];
        return redirect()->back()->with('notification', [
            'type'=>'warning',
            'message'=>'Yakin mau hapus data?',
            'options'=>[
                [ 'text'=>'Hapus', 'type'=>'danger', 'post'=> [
                    'path'=>"/$role/delete/$request->id"
                ] ],
                [ 'text'=>'Batal', 'type'=>'secondary' ]
            ]
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $role = explode('/', request()->path())[0];
        Pegawai::find($id)->delete();

        return redirect("/$role")->with('notification', [
            'type' => 'success',
            'message' => "Pegawai berhasil dihapus!",
            'options' => [
                ['text' => 'Lanjut', 'type' => 'primary']
            ]
        ]);
    }
}
