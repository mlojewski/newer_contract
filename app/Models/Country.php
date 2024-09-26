<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    public function cities()
    {
        return $this->hasMany('App\Models\City');
    }

    public function People()
    {
        return $this->hasMany('\App\Models\Person');
    }

    public function Flag()
    {
        return $this->hasOne('\App\Models\Flag');
    }
}
