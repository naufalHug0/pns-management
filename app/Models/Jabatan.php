<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $table = 'jabatan';

    public function pegawai() {
        return $this->hasMany(Pegawai::class);
    }

    public function eselon() {
        return $this->belongsTo(Eselon::class, 'eselon_id');
    }

    public function unit_kerja() {
        return $this->belongsTo(UnitKerja::class, 'unit_kerja_id');
    }
}
