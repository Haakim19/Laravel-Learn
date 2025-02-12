<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
