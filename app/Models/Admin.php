<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $guarded = ['id'];
    public $timestamps = true;
    protected $table = 'admin';

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
}
