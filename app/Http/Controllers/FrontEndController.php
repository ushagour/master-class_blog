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
     ->with('first_post',Post::orderBy('created_at','desc')->first());// first post the last created akhiir wahd t crea 


 }


}
