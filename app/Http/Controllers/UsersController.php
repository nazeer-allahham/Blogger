<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;
use App\User;

class UsersController extends Controller
{
    public function show()
    {
        $posts = auth()->user()->posts;
        //dd($posts);
        return view('posts.index', compact('posts'));
    }

    public function edit()
    {
        return view('users.edit');
    }

    public function update()
    {
        $user = auth()->user();

        if(request('name') !== null) {
            $user->name = request('name');
            
            session()->flash('message', 'Your name updated');
        }
        if(request('email') !== null) {
            $user->email = request('email');
            session()->flash('message', 'Your email updated');            
        }
        if(request('password') !== null) {
            $user->password = Hash::make(request('password'));
            session()->flash('message', 'Your password updated');
        }
        if(request('gender') !== null) {
            $user->gender = request('gender');
        }
        if(request('birthday') !== null) {
            $user->birthday = request('birthday');
            session()->flash('message', 'Your birthday updated');
        }
        $user->save();

        return back();
    }


    function gender(User $user) 
    {
        return [
            'gender' => $user->gender
        ];
    }
    function name(User $user) 
    {
        return [
            'name' => $user->name
        ];
    }
}
