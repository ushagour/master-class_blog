<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Illuminate\Http\UploodedFile; //classe pour utilser la methode store 
use Illuminate\Support\Str; //
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('admin.users.index',["users"=>$users]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //hena f had methode ghnkhdmo bhal ila ghancreatew wahd seeder user

        $valition = $request->validate([
            'name' => 'required|max:255',//|unique:posts y3nii ykoon 1
            'email' => 'required|email|unique',

        ]);


        #hena khdmna b methode create bach nrecuperi les info dyal user li t creia bhal id li ghankhdm biih blow
$user =  User::create([
    "name" => $request->name,
    'email' => $request->email,
    'password' =>  Hash::make('password'),
]);


$profile = Profile::create([
#les autres  champs sont par defult null 
'user_id'=>$user->id

]);

Session::flash('success','profile created successfuly');

return redirect()->route('users.index');
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
    }
}
