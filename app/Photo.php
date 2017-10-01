<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use \Conner\Tagging\Taggable;
    protected $fillable = ['photo', 'thumb', 'created_at', 'updated_at', 'type', 'caption'];
    protected $table = 'photos';

    public function people(){
        return $this->belongsToMany(Person::class, 'people_photos', 'photo_id', 'person_id');
    }
}
