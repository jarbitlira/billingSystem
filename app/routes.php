<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['before'=>'auth'],function(){
    Route::get('/', 'DashboardController@index');
});

//Route::get('/', function()
//{
//	return View::make('hello');
//});



Route::get("/login", function () {
    if (!Auth::check()) {
        return View::make("login");
    }else{
        return Redirect::to("/");
    }
});

Route::post("/login", function () {
    $user = [];
//    $user["email"] = Input::get("email");
    $user["username"] = Input::get("username");
    $user["password"] = Input::get("password");
    if(Auth::attempt($user)){
        return Redirect::to("/");
    }else{
        return Redirect::back()->withInput();
    }
});


Route::get('/logout',function(){
   Auth::logout();
    return Redirect::to("/login");
});
