<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id'];

    public $timestamps = true;
    protected $table = 'pegawai';
    protected $hidden = ['password'];

    public function getAuthIdentifierName()
    {
        return 'id'; // Assuming your primary key is named 'id'
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password; // Assuming your password column name is 'password'
    }

    public function agama() {
        return $this->belongsTo(Agama::class,'agama_id');
    }

    public function jabatan() {
        return $this->belongsTo(Jabatan::class,'jabatan_id');
    }

    public function golongan() {
        return $this->belongsTo(Golongan::class,'golongan_id');
    }

    public function scopeFilter($query, array $filters)
    {
        $query->when(
            $filters['search'] ?? false,
            function ($query, $search) {
                return $query->where("nama", "like", '%' . $search . '%')
                    ->orWhere("alamat", "like", '%' . $search . '%');
            }
        );

        $query->when(
            isset($filters['unit-kerja']) ? ($filters['unit-kerja'] != 'all' ? $filters['unit-kerja'] : false) : false,
            function ($query, $unit_kerja) {
                return $query->whereHas('jabatan.unit_kerja', function ($query) use ($unit_kerja) {
                    return $query->where('jabatan.unit_kerja_id', $unit_kerja);
                });
            }
        );
    }
}
