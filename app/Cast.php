<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    protected $table = 'casts_movies';

    protected $fillable = ['movie_id', 'person_id', 'character_name', 'billing_position'];
}
