<?php

namespace App\Http\Controllers;

use App\Category;
use App\Setting;
use App\Post;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
 public function index()
 {
     return view('welcome')
     ->with('title',Setting::first()->site_name)
     ->with('Categorys',Category::Take(4)->get())// take query builder methode 
     ->with('first_post',Post::orderBy('created_at','desc')->first())// first post the last created akhiir wahd t crea 
     ->with('second_post',Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first())
     ->with('therd_post',Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
     ->with('Food',Category::find(6))
     ->with('Music',Category::find(7))
     ->with('Settings',Setting::first());

     /*
     1.get all post oredred by date 
     2.skip the last recorde
     3.take  one recorde 
     4.get  the result of the query builder 
     5.first to have 1 object   not a collection of object 
     6.do the same thing with therd post 
     */
 }


}
