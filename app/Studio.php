<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Studio extends Model 
{

    protected $table = 'studios';
    public $timestamps = true;
    protected $fillable = array('name', 'homepage');

}