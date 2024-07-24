<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class genre extends Model
{
    use HasFactory;

    public function file() 
    {
       return $this->belongsToMany(Film::class, 'genre_film','id_genre','id_film');
    }
}
