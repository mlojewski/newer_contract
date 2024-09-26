<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    use HasFactory;

    public function OrganizationType()
    {
        return $this->belongsTo('\App\Models\OrganizationType');
    }

    public function Languages()
    {
        return $this->belongsToMany('\App\Models\Language', 'organizations_languages');
    }

    public function Logo()
    {
        return $this->hasOne('\App\Models\OrganizationLogo');
    }

    public function User()
    {
        return $this->hasOne('\App\Models\User');
    }
}
