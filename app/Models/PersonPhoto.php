<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonPhoto extends Model
{
    use HasFactory;

    public function Person()
    {
        return $this->belongsTo('\App\Models\Person');
    }
}
