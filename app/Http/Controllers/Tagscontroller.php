<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Illuminate\Http\UploodedFile; //classe pour utilser la methode store 
use Illuminate\Support\Str; //
use Illuminate\Support\Facades\Session;



class Tagscontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $tags=Tag::all();

        return view('admin.tags.index')->with('tags',$tags);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.tags.create');

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
        $request->validate(['tag'=>'required|max:25']);
        $tag = new Tag;
        $tag->tag = $request->tag;
        $tag->save();
        Session::flash('message', 'tag created succesfuly!'); 
        Session::flash('alert-class', 'alert-success'); 
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
        $tag =Tag::find($id);
        return view('admin.tags.edit',["tag"=>$tag]);
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
        //d
        $tag=Tag::find($id);
        $tag->tag=$request->tag;
        $tag->save();
        Session::flash('message', 'tag updated succesfuly!'); 
        Session::flash('alert-class', 'alert-success'); 
        
          return redirect()->route('tag.index');
   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //*
        $tag=Tag::find($id);

        $tag->delete();
        Session::flash('message', 'tag deleded defunetly!'); 
        Session::flash('alert-class', 'alert-danger'); 
        return redirect()->back();

    }
}
