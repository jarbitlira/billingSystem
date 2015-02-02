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
    Route::controller('login', 'LoginController');

    Route::group(array('before' => 'auth'), function () {
        Route::get('/', 'Administrator\DashboardController@index');
        Route::get('/logout', 'LoginController@logout');

        Route::get('profile', 'UsersController@profile');
        Route::put('profile', 'UsersController@profile');

        Route::resource('provider', 'Administrator\ProviderController');
        Route::resource('product', 'Administrator\ProductsController', ['except' => 'show']);
        Route::resource('product/category', 'Administrator\ProductsCategoriesController');
        Route::resource('client', 'Administrator\ClientController', ['except' => 'show']);
        Route::resource('invoice', 'Administrator\InvoiceController', ['only' => ['index', 'show']]);
        Route::resource('user', 'Administrator\UserController');
        Route::controller('config', 'Administrator\ConfigController');
        //temporal billing route
        Route::controller('billing', 'Billing\InvoiceController');
        Route::get('product/json', 'Administrator\ProductsController@json');
        Route::get('client/json', 'Administrator\ClientController@json');
        Route::controller('print', 'PrintController');
        // Dashboard
        Route::get('json/lastMonthSales', 'Administrator\DashboardController@chartsLastMonthSales');
    });

});