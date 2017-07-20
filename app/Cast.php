<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cast extends Model
{
    protected $table = 'casts_movies';

    protected $fillable = ['movie_id', 'person_id', 'character_name', 'billing_position'];

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
