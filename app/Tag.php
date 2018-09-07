<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Post;

class Tag extends Model
{
    public $fillable = ['name'];

    function posts()
    {
        return $this->belongsToMany(Post::class);   
    }

    function getRouteKeyName()
    {
        return 'name';
    }
}
