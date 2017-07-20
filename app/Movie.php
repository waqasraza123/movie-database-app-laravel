<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model 
{

    protected $table = 'movies';
    public $timestamps = true;
    use \Conner\Tagging\Taggable;
    use SoftDeletes;


    protected $dates = ['deleted_at'];
    protected $fillable = array('title', 'aka_title', 'plot', 'synopsis', 'background_path',
        'age_rating', 'stream_url', 'buy_url', 'release_date', 'views', 'poster_path', 'homepage', 'featured', 'runtime');

    public function people()
    {
        return $this->belongsToMany('Person', 'movies_people');
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genres_movies');
    }

    public function Keywords()
    {
        return $this->hasMany('Keyword', 'keywords_movies');
    }

    public function videos()
    {
        return $this->hasMany('Video');
    }

    public function languages()
    {
        return $this->belongsToMany(Language::class, 'languages_movies', 'movie_id', 'language_id');
    }

    //a movie has only one age rating
    public function ageRating(){
        return $this->belongsTo(AgeRating::class, 'age_rating', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cast(){
        return $this->hasMany(Cast::class, 'movie_id', 'id');
    }

}