<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

use Illuminate\Support\Facades\Session;
class SettingController extends Controller
{
    //


    public function index()
    {
        $setting = Setting::first();
        // dd($setting);
            // $setting->site_name;
        return view('admin.settings.index',["setting"=>$setting]);  // nb  vartiable $ setting de type object w view kansifto liha ghiir string donc khassna nsiifto se forme dun tableaux
    
    }





    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
          

        $request->validate([

            'site_name' => 'required|max:20',
            'contact_number' => 'required|max:25',
            'contact_email' => 'required|email',
            'address' => 'required|'
          
        ]);



        $setting = Setting::first();
        $setting->site_name=$request->site_name;
        $setting->contact_number=$request->contact_number;
        $setting->contact_email=$request->contact_email;
        $setting->address=$request->address;









        $setting->save();
        Session::flash('info', 'setting updated succesfuly!'); 
        Session::flash('alert-class', 'alert-success'); 
        
          return redirect()->route('setting.index');
   
    }
}
