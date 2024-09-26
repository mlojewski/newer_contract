<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    public function Organizations()
    {
        return $this->belongsToMany('\App\Models\Organization');
    }

    public function People()
    {
        return $this->belongsToMany('\App\Models\Person');
    }

}
