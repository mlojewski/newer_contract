<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrganizationType extends Model
{
    use HasFactory;

    public function Organizations()
    {
        return $this->hasMany('\App\Models\Organization');
    }
}
