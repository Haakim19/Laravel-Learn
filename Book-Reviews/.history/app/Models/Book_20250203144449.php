<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Review;

class Book extends Model
{
    use HasFactory;
    function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
