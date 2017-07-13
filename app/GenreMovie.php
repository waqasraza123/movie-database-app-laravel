<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenreMovie extends Model 
{

    protected $table = 'genres_movies';
    public $timestamps = true;
    protected $fillable = array('genre_id');

}