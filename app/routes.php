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

$domain = App::environment() == 'local' ? 'billingsystem' : 'billingsystem.uni.me';

Route::group(array('domain' => $domain), function () {
    Route::get('/', function () {
        return View::make('index');
    });

});

Route::group(array('domain' => 'admin.' . $domain), function () {

    Route::group(array('before' => 'auth'), function () {
        Route::get('/', 'DashboardController@index');

        Route::any('/login', function () {
            return Redirect::to('/');
        });

        Route::get('/logout', function () {
            Auth::logout();
            return Redirect::to("/login");
        });

    });


    Route::post("/login", function () {
        $user = [];
        $user["email"] = Input::get("email");
        $user["password"] = Input::get("password");
        if (Auth::attempt($user)) {
            return Redirect::to("/");
        } else {
            return Redirect::back()->withInput();
        }
    });

    Route::resource('product', 'ProductsController');
});

