<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Like;

class LikesController extends Controller
{

    public function store($post_id)
    {
        $like = new Like;
        $like->user_id = auth()->user()->id;
        $like->post_id = $post_id;
        $like->save();

        return back();
    }
}
