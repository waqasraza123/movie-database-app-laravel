<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model 
{
    use \Conner\Tagging\Taggable;
    protected $table = 'videos';
    public $timestamps = true;
    protected $fillable = array('title', 'type', 'quality', 'video_url', 'video_embed', 'movie_id', 'thumb', 'text');

    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function people(){
        return $this->belongsToMany(Person::class, 'people_videos', 'video_id', 'person_id');
    }



}