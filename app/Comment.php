<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\Post;
use App\User;

class Comment extends Model
{
    public $fillable = [
        'user_id',
        'post_id',
        'body'
    ];

    public function post() {
        return $this->belongTo(Post::class);
    }

    public function publisherName() {
        return User::find($this->user_id)->name;
    }
}
