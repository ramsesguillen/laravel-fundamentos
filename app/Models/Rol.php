<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;

    public function user()
    {
        // return $this->hasOne( User::class );
        return $this->hasMany( User::class );
    }
}
