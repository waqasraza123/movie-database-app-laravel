<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MoviePerson extends Model 
{

    protected $table = 'movies_people';
    public $timestamps = true;
    protected $fillable = array('note');

}