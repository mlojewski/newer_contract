<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonType extends Model
{
    use HasFactory;

    public function People()
    {
        return $this->hasMany('\App\Models\Person');
    }

    public function Ads()
    {
        return $this->belongsToMany('\App\Models\Ad', 'ads_person_types');
    }

    public function Icon()
    {
        return $this->hasOne('\App\Models\PersonTypeIcon');
    }
}
