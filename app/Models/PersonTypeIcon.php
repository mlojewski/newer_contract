<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonTypeIcon extends Model
{
    use HasFactory;

    public function personType()
    {
        return $this->belongsTo('\App\Models\PersonType');
    }
}
