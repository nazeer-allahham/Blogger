<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Like;
use App\Tag;
use App\Comment;
use App\User;

class Post extends Model
{
    //

    public function publisherName()
    {
        return User::find($this->user_id)->name;
    }

    public function publisherGender()
    {
        return User::find($this->user_id)->gender;
    }

    public function likes() 
    {
        return $this->hasMany(Like::class);
    }

    public function tags() 
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilter($query, $name) 
    {
        $id = User::where('name', $name)->first()->id;
        return Post::where('user_id', $id)->get();
    }
}
