<?php

namespace App;

use Conner\Tagging\Model\Tagged;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use \Conner\Tagging\Taggable;
    public $fillable = [
        'title',
        'image',
        'is_draft',
        'created_at',
        'updated_at',
        'views',
        'body',
        'summary',
        'user_id',
        'slug'
    ];


    public function categories(){
        return $this->belongsToMany(Category::class, 'category_posts', 'post_id', 'category_id');
    }
}
