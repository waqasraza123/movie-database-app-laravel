<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoviePhoto extends Model
{
    public $table = 'movie_photos';
    protected $fillable = ['movie_id', 'photo_id'];
}
