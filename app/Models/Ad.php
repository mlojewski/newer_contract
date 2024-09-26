<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ad extends Model
{
    use HasFactory;

    public function City()
    {
        return $this->belongsTo('\App\Models\City');
    }

    public function Sport()
    {
        return $this->belongsTo('\App\Models\Sport');
    }

    public function User()
    {
        return $this->belongsTo('\App\Models\User');
    }

    public function PersonTypes()
    {
        return $this->belongsToMany('\App\Models\PersonType', 'ads_person_types');
    }
}
