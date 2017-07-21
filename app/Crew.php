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
    public function person(){
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function job(){
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }

}
