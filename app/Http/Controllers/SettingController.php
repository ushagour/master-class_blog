<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
class SettingController extends Controller
{
    //


    public function index()
    {
        $setting = Setting::first();
        dd($setting);
    
        // return view('admin.settings.index',$setting);
    
    }
}
