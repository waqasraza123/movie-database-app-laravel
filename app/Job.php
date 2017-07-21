<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model 
{

    protected $table = 'jobs';
    protected $fillable = ['name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function crew(){
        return $this->belongsToMany(Crew::class, 'crew_jobs', 'job_id', 'crew_id');
    }

}