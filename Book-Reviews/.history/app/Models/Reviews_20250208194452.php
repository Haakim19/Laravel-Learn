<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = ['review', 'rating'];
    public function book()
    {
        return $this->belongsTo(Book::class);
    }
    protected static function booted() {}
}
