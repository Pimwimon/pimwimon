<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/test',function(){
	$users = DB::table('Admin')->select('Admin_name')->$Admin_id->get();

	return $users;
});
// Route::get('/',function(){
// 	return view('welcome')
// });

// Route::get('/food_type','healthyController@add_food_type');
// Route::get('/food',function(){
// 	return view('food');
// });

// use Illuminate\Http\Request;
// Route::get('/xxx',function(Request $req){
// 	$Admin_id=0;
// 	if($req->session()->has('xxx'))
// 	{
// 		$Admin_id=$req->session()->get('xxx');
// 		$Admin_id+=1;
// 	}
// 	echo $req->session()->set('xxx',$Admin_id);
// 	echo $req->session()->get('xxx');
// });
///------------------------------------------------------------///

Route::group(['middleware' =>'checkadmin'],function(){
	Route::get('/index','healthyController@login');

	Route::get('/cfood_type', function () {
	return view('cfood_type');
	});

	Route::get('/cexercise', function () {
		return view('cexercise');
	});

	Route::get('/add_admin',function(){
		return view('add_admin');
	});

	Route::get('/food_type','healthyController@getData');

	Route::get('/food','healthyController@getFood');

	Route::get('/exercise','healthyController@getExercise');

	Route::get('/cfood','healthyController@getFood_type');
	// 
	//---------------------------

	Route::post('/add_admin','healthyController@add_admin');

	// Route::post('/index','healthyController@login');

	Route::post('/insert_food_type','healthyController@insert_food_type');

	Route::post('/insert_food','healthyController@insert_food');

	Route::post('/insert_exercise','healthyController@insert_exercise');

	/////----------------------edit ----------------------//

	// Route::get('/efood_type/{Food_type_id}','healthyController@edit_food_type');
	Route::get('/efood_type&{Food_type_id}','healthyController@edit_food_type');
	Route::post('/update_foodtype&{Food_type_id}','healthyController@update_foodtype');

	Route::get('/efood&{Food_id}','healthyController@edit_food');
	Route::post('/update_food&{Food_id}','healthyController@update_food');

	Route::get('/e_exercise&{Et_id}','healthyController@edit_exercise');
	Route::post('/update_exercise&{Et_id}','healthyController@update_exercise');

	////-----------------------delect ----------------------------///
	Route::get('/delete_food_type/{Food_type_id}','healthyController@delete_food_type');

	Route::get('/delete_food/{Food_id}','healthyController@delete_food');

	Route::get('/delete_exercise/{Et_id}','healthyController@delete_exercise');

});

Route::get('/','healthyController@home');

Route::post('/loginprocess','healthyController@loginprocess');

Route::get('/logout','healthyController@logout');

// ------------------- แสดงผล ข้อมูล ---------------------///
