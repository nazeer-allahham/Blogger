<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\User;
use App\Post;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function search() 
    {
        $results = new Results;
        $results->accounts = User::latest()->filter(request(['search']));
        $results->posts = Post::latest()->filter(request(['search']));
        
        $search_key = request('search');
        
        return view('search', compact('results', 'search_key'));
    }
}

class Results
{
    public $accounts;
    public $posts;
}

