<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    public function Sport()
    {
        return $this->belongsTo('\App\Models\Sport');
    }

    public function Gender()
    {
        return $this->belongsTo('\App\Models\Gender');
    }

    public function Country()
    {
        return $this->belongsTo('\App\Models\Country');
    }

    public function Languages()
    {
        return $this->belongsToMany('\App\Models\Language', 'people_languages');
    }

    public function PersonType()
    {
        return $this->belongsTo('\App\Models\PersonType');
    }

    public function Photo()
    {
        return $this->hasOne('\App\Models\PersonPhoto');
    }

    public function User()
    {
        return $this->hasOne('\App\Models\User');
    }

    public function Ads()
    {
        return $this->belongsToMany('\App\Models\Ads');
    }
}
