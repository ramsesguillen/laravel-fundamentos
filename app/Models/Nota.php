<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = 'notas';

    public function message()
    {
        return $this->belongsTo( Message::class );
    }
}
