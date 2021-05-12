<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Http\UploodedFile; //classe pour utilser la methode store 
use Illuminate\Support\Str; //

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
        return view('admin.posts.index')->with('posts',$posts);
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
            if ($categories->count()==0) {


            session()->flash('info','you must have categories before crateing new post');
            }


        return view('admin.posts.create')->with('categories',$categories);// had with hiiya li katsiiift liina array dyal les categories m3a had view
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

        //nb: we link th validation role with the name of input
        $validatedData = $request->validate([
            'title' => 'required|max:255',//|unique:posts todo see what happen
            'featured' => 'required|image',
            'content' => 'required|max:1000',
            'category_id' => 'required',
        ]);


        $path="no_ files";
        if ($request->hasFile('featured')) {
       
       $path = $request->file('featured')->store('featured');
       }

        $newpost = new Post;
        $newpost->title = $request->title;
        $newpost->featured = $path;
        $newpost->content = $request->content;
        $newpost->category_id = $request->category_id;
        $newpost->slug = str::slug($request->title); // dad function dyal helper str kadiir slug l text katredo ligne whda b "_"

        $newpost->save();

     session()->flash('msg','profile cretaed succefuly');
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
        session()->flash('msg','profile deleded succesfuly !');

        return redirect()->route('home');
    }
}
