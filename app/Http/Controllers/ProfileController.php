<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploodedFile; //classe pour utilser la methode store 
use Illuminate\Support\Str; //
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Symfony\Component\HttpKernel\Profiler\Profiler;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // echo'<pre>';
        $userId = Auth::id()        ;
    // return (User::find($userId)->profile->avatar);
      return view('admin.users.profile')->with("user", User::find($userId));  //Auth::user();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //



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
        $validatedData = $request->validate([

            'name' => 'required|max:255',
            'email' => 'required|email'
          
        ]);

         $user = Auth::user();
 if ($request->has('avatar')) {
    
           $path = $request->file('avatar')->store('avatars');
              $user->profile->avatar=$path;     
            // echo $path;
            // dd($user->profile->avatar) ;
            $user->profile->save();
 }


 $user->name = $request->name;
 $user->email = $request->email;
 $user->profile->facebook = $request->facebook;
 $user->profile->youtube = $request->youtube;
 $user->profile->about = $request->about;

//hena derna filled bach ntestiw wach input kayn f request w not empty 
 if ($request->filled('newpassword')) {

$NewPassword = Hash::make($request->newpassword);

 $user->password = $NewPassword; 
$user->save();
 }


 $user->save();
 $user->profile->save();
 Session::flash('toaster-message', 'profile updated succesfuly!'); 
 Session::flash('atoaster-class', 'success'); 
 
     return redirect()->back();
        
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
    }
}
