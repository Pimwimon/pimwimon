<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\DB;
use App\post;
use Illuminate\Support\Facades\View;
use App\Admin;

class LoginController extends Controller
{
    public function loginprocess(Request $req)
    {
    	$Admin_id = $req->get('Admin_id');
    	$Admin_password = $req->get('Admin_password');
    
      $checkLogin = Admin::selectRaw("Count(*) as Total")->where('Admin_id','=',$Admin_id)->first();

      if(intval($checkLogin->Total)> 0){
          $getpassword = Admin::select("Admin_password")->where('Admin_id','=',$Admin_id)->first();
    		  $req->session()->set('Admin_id',$Admin_id);
          return redirect('/index');

    	}else
    	{
    		return view('login');
    	}
    }	
     public function logout(Request $req)
    {
      $req->session()->flush();
      return redirect('/login');
    }	
}
