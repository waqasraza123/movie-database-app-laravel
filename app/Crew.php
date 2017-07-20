<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    protected $fillable = ['movie_id', 'person_id', 'job_id'];
    protected $table = 'crew_movies';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function movie(){
        return $this->belongsTo(Movie::class, 'movie_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person(){
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

}
