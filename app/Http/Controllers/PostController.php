<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\UploodedFile; //classe pour utilser la methode store 
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\Session;


class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $posts = Post::all();
        return view('back-office.posts.index')->with('posts',$posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
            $categories = Category::all();
            $tags = Tag::all();   


            if ($categories->count() ==0 || $tags->count() ==0) {

// had condition matkhliich user y cree post ila makanch tags w category 
            Session::flash('toaster-message','you must have categories  before crateing new post');
            Session::flash('toaster-class','info');
             return redirect()->back();
            }


        return view('back-office.posts.create')->with('categories',$categories)// had with hiiya li katsiiift liina array dyal les categories m3a had view
                                         ->with('tags',Tag::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
//dd($request->all());// die and demp with all methode 
        //nb: we link th validation role with the name of input
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'featured' => 'required|image',
            // 'content' => 'required|max:1000',
            'category_id' => 'required',
        ]);


        $path="no_files";
        if ($request->hasFile('featured')) {
            $path = $request->file('featured')->store('featured');

       }

        $post = new Post;
        $post->title = $request->title;
        $post->featured = $path;
        $post->content = $request->content;
        $post->category_id = $request->category_id;
        $post->slug = str::slug($request->title); // had function dyal helper str kadiir slug l text katredo ligne whda b "_"
        $post->user_id  =Auth::id();

        
        $post->save();

        $post->tags()->attach($request->selectedtags);
     Session::flash('toaster-message', 'post created succesfuly!'); 
     Session::flash('toaster-class', 'success'); 
     
       return redirect()->back();

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
          $post =Post::find($id);
          return view('back-office.posts.edit')->with('post',$post)
                                         ->with('categories',Category::all())
                                         ->with('tags',Tag::all());       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $post = Post::find($id);
        $validatedData = $request->validate([
            'title' => 'required|max:255',//|unique:posts todo see what happen
            'content' => 'required|max:1000',
            'category_id' => 'required',
        ]);
        if ($request->hasFile('featured')) {
            $path = $request->file('featured')->store('featured');

            $post->featured = $path;

            /*ila kan l file ghadi update  ytbdl f data base  sinon khelli l9edim */
       }

       $post->title = $request->title;
       $post->content = $request->content;
       $post->category_id = $request->category_id;
       $post->slug = str::slug($request->title); // dad function dyal helper str kadiir slug l text katredo ligne whda b "_"

       $post->save();

       $post->tags()->sync($request->selectedtags); // methode sync bnch t3yt 3la attach methode li ka associer post b tag 
       Session::flash('toaster-message', 'post updated succesfuly!'); 
       Session::flash('toaster-class', 'info'); 
       
         return redirect()->route('post.index');
  
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $post = Post::find($id);

        $post->delete();
     Session::flash('toaster-message', 'post deleded succesfuly!'); 
     Session::flash('toaster-class', 'error'); 
     

        return redirect()->back();
    }

    public function trashed()
    {
        // geting trashed data 
        $posts = Post::onlyTrashed()->get();
        return view('back-office.posts.trashed')->with('posts',$posts);
    }






    public function restore($id)
    {
        //

        $post = Post::withTrashed()->where('id',$id)->first();

        $post->restore();
     Session::flash('toaster-message', 'post restored succesfuly!'); 
     Session::flash('toaster-class', 'success'); 
     

        return redirect()->back();
    }

    public function kill($id)
    {
        //
        $post = Post::withTrashed()->where('id',$id)->first();


        $post->forceDelete();
       Session::flash('toaster-message', 'post deleded defunetly!'); 
       Session::flash('toaster-class', 'success');      

        return redirect()->back();
    }
}
