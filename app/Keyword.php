<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model 
{

    protected $table = 'keywords';
    public $timestamps = true;
    protected $fillable = array('keyword');

    public function movies()
    {
        return $this->belongsToMany('Movie', 'keywords_movies');
    }

}