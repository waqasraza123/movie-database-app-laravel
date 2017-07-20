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
    public function movies()
    {
        return $this->belongsToMany('Movie', 'movies_people')->withPivot('job_id', 'known_for', 'character', 'order_no', 'note')->orderBy('release_date', 'desc');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cast(){
        return $this->hasMany(Cast::class, 'person_id', 'id');
    }

}