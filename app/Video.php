<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model 
{

    protected $table = 'videos';
    public $timestamps = true;
    protected $fillable = array('title', 'type', 'quality', 'video_key');

    public function movie()
    {
        return $this->belongsTo('Movie');
    }

}