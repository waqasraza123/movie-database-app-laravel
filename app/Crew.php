<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    protected $fillable = ['movie_id', 'person_id','known_for', 'job_id'];
    protected $table = 'crew_movies';

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function person(){
        return $this->belongsTo(Person::class, 'person_id', 'id');
    }

    public function jobs(){
        return $this->belongsToMany(Job::class, 'crew_jobs', 'crew_id', 'job_id');
    }

}
