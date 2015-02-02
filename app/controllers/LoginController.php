<?php

class LoginController extends \BaseController
{
    /**
     * Display a listing of the resource.
     * GET /login
     *
     * @return Response
     */
    public function getIndex()
    {
        if (!Auth::check()) {
            return View::make("login");
        } else {
            return Redirect::to("/");
        }
    }

    public function postIndex()
    {
        if (!Auth::check()) {
            $user = [];
            $user["email"] = Input::get("email");
            $user["password"] = Input::get("password");
            if (Auth::attempt($user)) {
                return Redirect::to("/");
            } else {
                return Redirect::back()->withInput()
                    ->with('error', 'Email or password incorrect');
            }
        } else {
            return Redirect::to("login");
        }
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::to("/login");
    }


}