<?php

namespace Administrator;

use Repositories\Administrator\PermissionRepository;
use Repositories\Administrator\RoleRepository;
use Repositories\Administrator\UserRepository;

class PermissionController extends \BaseController
{

    protected $layout = 'admin.layouts.main';
    protected $role;
    protected $permission;

    public function __construct(RoleRepository $role, PermissionRepository $permission)
    {
        $this->role = $role;
        $this->permission = $permission;
    }

    public function getPermissions($userId)
    {
        if (!\Entrust::can("read_permission")) {
            return \Redirect::to("/");
        }
        $role = $this->role->findById($userId);
        $permissions = array(
            "create" => $this->permission->whereLike("name", "create")->get(),
            "read" => $this->permission->whereLike("name", "read")->get(),
            "update" => $this->permission->whereLike("name", "update")->get(),
            "delete" => $this->permission->whereLike("name", "delete")->get()
        );

        $this->layout->content = \View::make("admin.roles.permissions", compact("permissions", "role"))->with(
            'title',
            'Role permissions'
        );
    }

    public function postPermissions($userId)
    {
        if (!\Entrust::can("create_permission") || !\Entrust::can("update_permission")) {
            return \Redirect::to("/");
        }
        $permissions = \Input::get("permission");
        $role = $this->role->findById($userId);
        $role->perms()->sync($permissions);
        return \Redirect::to("role/$role->id/permissions");

    }

}