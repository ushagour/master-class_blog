<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Category;
use App\Mail\TestMail;
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
        return view('back-office.dashboard')
        ->with('count_posts',Post::all()->count())
        ->with('count_trashed_posts',Post::onlyTrashed()->get()->count())//hena derna get hiit only trashed methode dyal query builder 
        ->with('count_categories',Category::all()->count())
        ->with('count_users',User::all()->count());
    }

    public function SendMail()
    {
         $detail=[
    'title'=>'test mail by ali',
    'body' =>'the body of the mail '
         ];
         Mail::to("test@test.com")->send(new TestMail($detail));



//          use Mail;

// Mail::send('mail.login-verificatio', $data, function($message) use($email_to) {
//     $message->to($email_to, '')->subject
//         ('Login Security Number');
//     $message->from('ali.ouchagour01@gmail.com','xxxxxxxxxxx');
//  });
return "email seend";

    }

}
