<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eselon extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $table = 'eselon';

    public function jabatan() {
        return $this->hasMany(Jabatan::class);
    }
}
