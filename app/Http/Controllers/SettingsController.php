<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    //
    public function __construnct()

    {

$this->middleware('Admin'); // all function in this controller willle be use Admin middelware to cheeck if admin or not !

    }

public function index()
{
    $setting = Setting::first();
    
    return view('admin.settings.index',['setting'=>$setting]);

}

public function update()
{

}

}
