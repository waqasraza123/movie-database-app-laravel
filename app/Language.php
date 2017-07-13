<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model 
{

    protected $table = 'languages';
    public $timestamps = true;
    protected $fillable = array('language');

    public function movies()
    {
        return $this->belongsToMany('Movie', 'languages_movies');
    }

}