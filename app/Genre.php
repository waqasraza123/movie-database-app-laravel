<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Genre extends Model 
{

    protected $table = 'genres';
    public $timestamps = true;
    protected $fillable = array('genre');

    public function movies()
    {
        return $this->belongsToMany('Movie', 'genres_movies');
    }

}