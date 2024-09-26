<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportLogo extends Model
{
    use HasFactory;

    public function Sport()
    {
        return $this->belongsTo('\App\Models\Sport');
    }
}
