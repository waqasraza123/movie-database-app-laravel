<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Person extends Model 
{

    protected $table = 'people';
    public $timestamps = true;

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = array('name', 'nickname', 'birth_date', 'birth_place', 'gender', 'biography',
        'official_site', 'facebook', 'twitter', 'instagram', 'photo_path');

    /**
     * @return mixed
     */
    public function castMovies()
    {
        return $this->belongsToMany(Movie::class, 'casts_movies', 'person_id', 'movie_id');
    }

    public function crewMovies()
    {
        return $this->belongsToMany(Movie::class, 'crew_movies', 'person_id', 'movie_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cast(){
        return $this->hasMany(Cast::class, 'person_id', 'id');
    }

}