<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\User;
use App\Tag;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.dashboard')
        ->with('count_posts',Post::all()->count())
        ->with('count_trashed_posts',Post::onlyTrashed()->get()->count())//hena derna get hiit only trashed methode dyal query builder 
        ->with('count_categories',Category::all()->count())
        ->with('count_users',User::all()->count());
    }
}
