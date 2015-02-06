<?php

namespace Administrator;

use Repositories\Administrator\RoleRepository;
use Repositories\Administrator\PermissionRepository;

class RoleController extends \BaseController
{

    protected $role;
    protected $permission;
    protected $layout = 'admin.layouts.main';
    protected $breadcrumbs = ['Dashboard' => '/', 'Roles' => 'role'];

    public function __construct(RoleRepository $role, PermissionRepository $permission)
    {

        $this->role = $role;
        $this->permission = $permission;
    }

    /**
     * Display a listing of the resource.
     * GET /role
     *
     * @return Response
     */
    public function index()
    {
        $roles = $this->role->getAll();
        $totalRoles = $roles->get();
        $roles = $roles->paginate(10);
        $this->layout->content = \View::make("admin.roles.index", compact("roles", "totalRoles"));
    }

    /**
     * Show the form for creating a new resource.
     * GET /role/create
     *
     * @return Response
     */
    public function create()
    {
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make("admin.roles.create")->with('title', 'Create role');
    }

    /**
     * Store a newly created resource in storage.
     * POST /role
     *
     * @return Response
     */
    public function store()
    {
        $input = array_except(\Input::all(), ['_token', '_method']);
        $this->role->create($input);
        if ($this->role->succeeded()) {
            return \Redirect::to('role')->with('notice', 'Role was created successfully');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->role->errors());
        }

    }

    /**
     * Display the specified resource.
     * GET /role/{id}
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
     * GET /role/{id}/edit
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $role = $this->role->findById($id);
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     * PUT /role/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(\Input::all(), ['_method', '_token']);
        $this->role->update($id, $input);
        if ($this->role->succeeded()) {
            return \Redirect::to('role')->with('notice', 'Role was saved successfully');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->role->errors());
        }
    }

    /**
     * Remove the specified resource from storage.
     * DELETE /role/{id}
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        if ($this->role->delete($id)) {
            return \Redirect::to('role')->with('notice', 'Role was deleted successfully');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->role->errors());
        }
    }

}