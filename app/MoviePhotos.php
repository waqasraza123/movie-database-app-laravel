<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoviePhotos extends Model
{
    protected $fillable = ['movie_id', 'photo_path', 'title'];
    protected $table = 'movie_photos';
}
