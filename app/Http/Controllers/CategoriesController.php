<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Session;
class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $categories = Category::all();
        

        return view('back-office.categories.index',["categories"=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back-office.categories.create');
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
        $request->validate(['name' => 'required|max:255']);
        
        $category= new Category;
        $category->name=$request->name;
        $category->save();


        # session  fiiha message avec class bootstrap pour le style d'allert 
        Session::flash('toaster-message', 'category created succesfuly!'); 
        Session::flash('toaster-class', 'success'); 
        
        return redirect()->back();
        
        
        
       // dd($request);



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

        $category =Category::find($id);
        return view('back-office.categories.edit',["category"=>$category]);
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


        $category=Category::find($id);
        $category->name=$request->name;
        $category->save();
        Session::flash('toaster-message', 'category updated succesfuly!'); 
        Session::flash('toaster-class', 'info'); 
        
          return redirect()->route('category.index');
   
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

        $category=Category::find($id);

        $category->delete();
        Session::flash('toaster-message', 'category deleded defunetly!'); 
        Session::flash('toaster-class', 'error'); 
        return redirect()->back();

    }
}
