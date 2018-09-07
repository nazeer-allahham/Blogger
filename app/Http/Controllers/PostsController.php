<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Tag;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        return view('posts.index', compact('posts'));
    }
    
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    public function create() 
    {
        return view('posts.create');
    }

    public function store()
    {
        $this->validate(request(), [
            'body'  => 'required|min:2',
        ]);

        /* Post::create(request([
            'title',
            'body',
            'author'
        ])); */
        $post = new Post;
        $post->user_id = auth()->user()->id;
        $post->body  = request('body');
        $post->save();

        $tagsnames = request('tags');
        foreach($tagsnames as $tagname) {
            
            $tag = Tag::firstOrNew(array( 'name' => $tagname ));
            $tag->save();

            $post->tags()->attach($tag);
        }
        
        session()->flash(
            'message', 'Your post published!'
        );

        return redirect('/posts');
    }

    public function like(User $user) {
        
    }
}
