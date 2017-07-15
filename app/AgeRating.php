<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgeRating extends Model
{
    //mass assignable fields
    protected $fillable = ['id', 'age_rating'];

    //age rating has many movies
    public function movies(){
        return $this->hasMany(Movie::class, 'age_rating', 'id');
    }
}
