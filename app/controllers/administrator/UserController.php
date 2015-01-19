<?php

namespace Administrator;

use Repositories\Administrator\UserRepository;

class UserController extends \BaseController
{


    protected $layout = 'admin.layouts.main';
    protected $breadcrumbs = ['Dashboard' => '/', 'Users' => 'user'];
    protected $user;

    public function __construct(UserRepository $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     * GET /administrator/user
     *
     * @return Response
     */
    public function index()
    {
        $users = $this->user->getAll()->paginate(10);
        $this->layout->content = \View::make('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * GET /administrator/user/create
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.users.create')->with("title", "Create User");
    }

    /**
     * Store a newly created resource in storage.
     * POST /administrator/user
     *
     * @return Response
     */
    public function store()
    {
        $input = array_except(\Input::all(), ['_method', '_token']);

        $v = \Validator::make($input, $this->user->rules);

//		$this->user->create($input);
//		if ($this->user->succeeded()) {
        if ($v->passes()) {
            $this->user->create($input);
            return \Redirect::to('user');
        } else {
            return \Redirect::back()->withInput()->withErrors($v->errors());
        }
    }

    /**
     * Display the specified resource.
     * GET /administrator/user/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * GET /administrator/user/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = $this->user->findById($id);
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.users.edit', compact('user'))->with("title", "Edit User");
    }

    /**
     * Update the specified resource in storage.
     * PUT /administrator/user/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /administrator/user/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->user->delete($id)) {
            return \Redirect::to('user')->with('notice', 'User was deleted successfully');
        } else {
            return \Redirect::back()->withErrors($this->user->errors());
        }
    }

}