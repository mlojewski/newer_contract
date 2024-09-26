<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    public function People()
    {
        return $this->hasMany('\App\Models\Person');
    }

    public function SportLogo()
    {
        return $this->hasOne('\App\Models\SportLogo');
    }

    public function Ads()
    {
        return $this->hasMany('\App\Models\Ad');
    }
}
