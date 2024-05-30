<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $table = 'unit_kerja';

    public function jabatan() {
        return $this->hasMany(Jabatan::class);
    }

    public function tempat_tugas() {
        return $this->belongsTo(TempatTugas::class);
    }
}
