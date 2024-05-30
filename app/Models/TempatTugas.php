<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatTugas extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $table = 'tempat_tugas';

    public function unit_kerja() {
        return $this->hasMany(UnitKerja::class);
    }
}
