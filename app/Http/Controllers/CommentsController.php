<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function store($post_id)
    {
        $comment = Comment::create([
            'user_id' => auth()->user()->id,

            'post_id' => $post_id,

            'body' => request('body')
        ]);
        return back();
    }
}
