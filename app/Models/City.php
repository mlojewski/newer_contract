<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    public function Country()
    {
        return $this->belongsTo('App\Models\Country');
    }

    public function Ads()
    {
        return $this->hasMany('\App\Models\Ad');
    }
}
