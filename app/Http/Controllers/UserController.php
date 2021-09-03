<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Illuminate\Http\UploodedFile; //classe pour utilser la methode store 
use Illuminate\Support\Str; //
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use NunoMaduro\Collision\Adapters\Phpunit\State;
use Symfony\Component\HttpKernel\Profiler\Profiler;

class UserController extends Controller
{





    public function __construnct()

    {

$this->middleware('Admin'); // all function in this controller willle be use Admin middelware to cheeck if admin or not !

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $users = User::all();
        return view('back-office.users.index')->with('users',$users);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('back-office.users.create');
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
            'email' => 'required|email|unique:users',
            'username' => 'required|max:20|unique:users',

        ]);


        #hena khdmna b methode create bach nrecuperi les info dyal user li t creia bhal id li ghankhdm biih blow
$user =  User::create([
    "name" => $request->name,
    "username" => $request->username,
    'email' => $request->email,
    'password' =>  Hash::make('password'),
]);


$profile = Profile::create([
#les autres  champs sont par defult null 
'user_id'=>$user->id,
'avatar'=>'avatars/defult_user.png'

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
                $user =User::find($id);
                $user->profile->delete();
                $user->delete();
           //  return   Session::flush('info','user deleted succesfuly ');
                //  return   redirect()->back();

 }

    /**
     * change stage of boolien champ isadmin.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function toggle($id,$state)
    {
        //

        $user = User::find($id);
        $user->is_admin = !$state;
        $user->save();
        Session::flash("success",'Succefuly permition changed ');
        return redirect()->route('users.index');


    }
}
