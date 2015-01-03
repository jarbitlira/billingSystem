<?php

class UsersController extends \BaseController
{

    protected $layout = 'admin.layouts.main';

    /**
     * Display a listing of users
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return View::make('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user
     *
     * @return Response
     */
    public function create()
    {
        return View::make('users.create');
    }

    /**
     * Store a newly created user in storage.
     *
     * @return Response
     */
    public function store()
    {
        $validator = Validator::make($data = Input::all(), User::$rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        User::create($data);

        return Redirect::route('users.index');
    }

    /**
     * Display the specified user.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return View::make('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified user.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return View::make('users.edit', compact('user'));
    }

    /**
     * Update the specified user in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $user = User::findOrFail($id);
        $validator = Validator::make($data = Input::all(), User::$rules);
        if ($validator->fails()) {
            return Redirect::back()->withErrors($validator)->withInput();
        }
        $user->update($data);

        return Redirect::route('users.index');
    }

    /**
     * Remove the specified user from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return Redirect::route('users.index');
    }

    public function profile()
    {
        if (\Auth::check()) {
            $user = User::find(\Auth::user()->id);
            if (\Request::isMethod('put')) {
                $pass = \Input::get('password');
                $confirm = \Input::get('password_confirmation');
                $except = ['_method', '_token', 'password_confirmation', 'password'];
                $input = array_except(\Input::all(), $except);
                if (!empty($pass)) {
                    $input['password'] = Hash::make($pass);
                }
                if (Hash::check($confirm, \Auth::user()->getAuthPassword())) {
                    //	$except += (empty(\Input::get('password'))) ? \Input::get('password'): '';
                    //  Password::reset($input, function($user, $password){}
                    $user->update($input);
                    $message = ['notice' => 'Your data has been updated'];
                } else {
                    $message = ['error' => 'Retype your current password to apply changes'];
                }

                return \Redirect::back()->with($message);
            }
            $this->layout->content = \View::make('users.profile', compact('user'));
        } else {
            return \Redirect::to('/');
        }
    }
}
