<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function ($request) {
    //
});


App::after(function ($request, $response) {
    //
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function () {
    if (Auth::guest()) {
        if (Request::ajax()) {
            return Response::make('Unauthorized', 401);
        } else {
            return Redirect::guest('login');
        }
    }
});


Route::filter('auth.basic', function () {
    return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function () {
    if (Auth::check()) return Redirect::to('/');
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
*/

Route::filter('csrf', function () {
    if (Session::token() !== Input::get('_token')) {
        throw new Illuminate\Session\TokenMismatchException;
    }
});

function array_match($array, $key, $val)
{
    $results = [];
    foreach ($array as $element) {
        $results[$element[$key]] = $element[$val];
    }
    return $results;
}

View::composer('*', function ($view) {
    $siteConfig = Config::get('site');
    $view->with('siteConfig', $siteConfig);
});

function site_config($index)
{
    $siteConfig = Config::get('site');
    return isset($siteConfig[$index]) ? $siteConfig[$index] : '';
}

Event::listen('register.query', function () {
    $logs = DB::getQueryLog();
    $log = end($logs);

    $query = $log["query"];
    $bindings = $log["bindings"];

    // Format binding data for sql insertion
    foreach ($bindings as $i => $binding) {
        if ($binding instanceof \DateTime) {
            $bindings[$i] = $binding->format('\'Y-m-d H:i:s\'');
        } else if (is_string($binding)) {
            $bindings[$i] = "'$binding'";
        }
    }

//     Insert bindings into query
    $query = str_replace(array('%', '?'), array('%%', '%s'), $query);
    $query = vsprintf($query, $bindings);

    QueryLog::create(array(
        'query' => $query,
        'user_id' => Auth::user()->id
    ));
});

Event::listen('auth.login', function ($user) {
    AuthLog::create(array(
        'browser' => BrowserDetect::browserFamily(),
        'system' => BrowserDetect::osName(),
        'mobile_info' => BrowserDetect::deviceModel(),
        'device' => BrowserDetect::deviceFamily(),
        'ip' => Request::ip(),
        'user_id' => $user->id
    ));
});