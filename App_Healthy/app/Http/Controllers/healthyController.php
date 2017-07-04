<?php

namespace App\Http\Controllers;

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

class healthyController extends BaseController
{
    // use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    use AuthorizesResources, DispatchesJobs, ValidatesRequests;
    
    protected $AdminId;

    // public function __construct(Request $req)
    // {
    //   $Admin_id = $req->input('Admin_id');
    //   $Admin_password = $req->input('Admin_password');
    //   // $checkLogin = DB::table('Admin')->where(['Admin_id'=>$Admin_id,'Admin_password'=>$Admin_password])->get();
    //     $checkLogin = DB::table('Admin')->where(['Admin_id'=>$Admin_id,'Admin_password'=>$Admin_password])->get();
    
    //    $this->AdminId=$Admin_id;
    //     if(count($checkLogin) > 0)
    //   {
         
    //       View::share('/index',$AdminId);

    //   }
    //   else
    //   {
    //     Session::flash('message', 'Login Faield'); 
    //     return view('/login');

    //   }
    // }

    public function home(){
      return view('login');
    }

    public function login(){
      return view('index');
    }

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
      return redirect('/');
    }
    public function add_admin(Request $req)
    {
        echo $AdminId;
        $Admin_id = $req->input('Admin_id');
        $Admin_name= $req->input('Admin_name');
        $Admin_password = $req->input('Admin_password');
        $data = array('Admin_id'=>$Admin_id,'Admin_name'=>$Admin_name,'Admin_password'=>$Admin_password);
        DB::table('Admin')->insert($data);
        
        Session::flash('message', 'Add Admin Success'); 
        return view('add_admin',$Admin_id);
    }
   
   public function insert_food_type(Request $req){
        $Food_type_id = $req->input('Food_type_id');
        $Food_type= $req->input('Food_type');
        $data = array('Food_type_id'=>$Food_type_id,'Food_type'=>$Food_type);
        // DB::table('Food_type')->orderBy('Food_type_id')->insert($data);
        
        echo $id;
        DB::table('Food_type')->insert($data);
        // $this->getData();
        Session::flash('message', 'Add Food type Success'); 
         return redirect('/food_type');
   }

     public function insert_food(Request $req)
   {
        $Food_id = $req->input('Food_id');
        $Food_name= $req->input('Food_name');
        $Food_cal= $req->input('Food_cal');
        $Food_type_id = $req->input('Food_type_id');
        $Admin_id  = $req->session()->get('Admin_id');
           
        $data = array('Food_id'=>$Food_id,'Food_name'=>$Food_name,'Food_cal'=>$Food_cal,'Food_type_id'=>$Food_type_id,'Admin_id'=>$Admin_id);
        DB::table('Food')->insert($data);
        Session::flash('message', 'Add Food type Success'); 
        return redirect('/food');
   }

   public function insert_exercise(Request $req){
        $Et_id = $req->input('Exercise_id');
        $Et_name= $req->input('Exercise_name');
        $Et_cal= $req->input('Exercise_cal');
        // $Et_pic= $req->File('File_exercise').(jpg);
        $Et_pic = $Et_id.'.jpg'; 
        $req->file('File_exercise')->move(base_path().'/public/image/icon_exercise/',$Et_pic);
        $Admin_id  = $req->session()->get('Admin_id');

    
        // $checkLogin = DB::table('Admin')->where(['Admin_id'=>$Admin_id])->get();
        //  if(count($checkLogin) > 0)
        // {
            
        //     $Admin_id = $checkLogin[1];
        // }
        $data = array('Et_id'=>$Et_id,'Et_name'=>$Et_name,'Et_cal'=>$Et_cal,'Et_pic'=>$Et_pic,'Admin_id'=>$Admin_id);
        DB::table('Exercise_type')->insert($data);
        Session::flash('message', 'Add Exercise_type Success'); 
         return redirect('/exercise');
   }

   public function getData()
   {
        $data['data'] = DB::table('Food_type')->get();
        if(count($data) > 0)
        {
            return view('food_type',$data);
        }
        else
        {
            return view('food_type');
        }
    
   }


        
   public function getFood_type()
   {
        $data['data'] = DB::table('Food_type')->select('Food_type_id','Food_type')->get();

        // $Food_id_latest['Food_id_latest'] = DB::table('Food')->max('Food_id');

        if(count($data) > 0)
        {
            return view('/cfood',$data);

        }    
   }


   public function getFood()
   {
        $data['data'] = DB::table('Food')->get();
        $data2['data2'] = DB::table('Food_type')->get();
        
      
        if(count($data) > 0)
        {
            // Session::flash('message', $type);
            return view('food',$data + $data2);

        }
        else
        {
            return view('food');
        }
   }

   public function getExercise()
   {
        $data['data'] = DB::table('Exercise_type')->get();
        if(count($data) > 0)
        {
            return view('exercise',$data);
        }
        else
        {
            return view('exercise');
        }
   }
// --------------------------delete  -----------------------------
   public function delete_food_type($Food_type_id)
   {
        DB::table('Food_type')->where('Food_type_id',$Food_type_id)->delete();
        return redirect('/food_type');
   }

   public function delete_food($Food_id)
   {
        DB::table('Food')->where('Food_id',$Food_id)->delete();
        return redirect('/food');
   }
    public function delete_exercise($Et_id)
   {
        DB::table('Exercise_type')->where('Et_id',$Et_id)->delete();
        return redirect('/exercise');
   }

// --------------------------edite  update foodtype -----------------------------
   public function edit_food_type($Food_type_id)
   {
         $data['data'] = DB::table('Food_type')->where('Food_type_id',$Food_type_id)->get();
      
       return view('/efood_type',$data);
      
   }
   public function update_foodtype(Request $req)
   {
       
        $Food_type_id = $req->input('Food_type_id');
        $Food_type= $req->input('Food_type');
        
        DB::table('Food_type')
        ->where('Food_type_id', $Food_type_id)
        ->update(['Food_type' => $Food_type]);

        Session::flash('message', 'Update Food type Success'); 
         return redirect('/food_type');
   }
//--------------------------------------------------------------------------------
 
// --------------------------edite update food -----------------------------

   public function edit_food($Food_id)
   {

        $data_food['data_food'] = DB::table('Food')->where('Food_id',$Food_id)->get();
        
        $data_type['data_type'] = DB::table('Food_type')->select('Food_type_id','Food_type')->get();
       return view('/efood',$data_food + $data_type);
       // return view('/efood',$data_type);
      
   }
   public function update_food(Request $req)
   {
       
        $Food_id = $req->input('Food_id');
        $Food_name= $req->input('Food_name');
        $Food_cal= $req->input('Food_cal');
        $Food_type_id= $req->input('Food_type_id');
        $Admin_id = $req->input('Admin_id');
        $this->getFood();
        DB::table('Food')
        ->where('Food_id', $Food_id)
        ->update(['Food_name' => $Food_name,'Food_cal'=>$Food_cal,'Food_type_id'=>$Food_type_id,'Admin_id'=>$Admin_id]);

        Session::flash('message', $Food_type_id); 
         return redirect('/food');
   }

//------------------------------------------------------------
 

//  // --------------------------edite update exercise -----------------------------

   public function edit_exercise($Et_id)
   {
      

        $data_exercise['data_exercise'] = DB::table('Exercise_type')->where('Et_id',$Et_id)->get();
        
       
       return view('/e_exercise',$data_exercise);
       // return view('/efood',$data_type);
      
   }
   public function update_exercise(Request $req)
   {
       
        $Et_id = $req->input('Exercise_id');
        $Et_name= $req->input('Exercise_name');
        $Et_cal= $req->input('Exercise_cal');
        $Et_pic= $req->input('File_exercise');
        $Admin_id = $req->input('Admin_id');
        $this->getFood();
        DB::table('Exercise_type')
        ->where('Et_id', $Et_id)
        ->update(['Et_name' => $Et_name,'Et_cal'=>$Et_cal,'Et_pic'=>$Et_pic,'Admin_id'=>$Admin_id]);

        Session::flash('message', 'Update Exercise Success'); 
         return redirect('/exercise');
   }

//------------------------------------------------------------
 }  

    
