<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Session;
class SettingController extends Controller
{
	public function __construct()
	{
		$this->middleware('admin');
	}
    public function index()
    {
     	return view('admin.settings.settings')->with('settings', Setting::first());
	}

    public function update()
    {
    	
      $this->validate(request(),[
       'site_name'=>  'required',
       'address'=> 'required',
       'about'=> 'required',
       'contact_number'=> 'required',
       'contact_email'=>'required'
      ]);

      $settings = Setting::first();

      $settings->site_name = request()->site_name;
      $settings->address = request()->address;
      $settings->about = request()->about;
      $settings->contact_email = request()->contact_email;
      $settings->contact_number = request()->contact_number;

      $settings->save();

      Session::flash('success','Success Updated settings.');
    

      return redirect()->back();
    }
}
