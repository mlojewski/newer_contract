<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPhoto extends Model
{
    use HasFactory;

    public function blog()
    {
        return $this->belongsTo('\App\Models\Blog');
    }
}
