<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 29/12/2014
 * Time: 11:30 PM
 */
namespace Repositories\Administrator;

use User;

class UserEloquent extends \Repositories\BaseRepository implements UserRepository
{

    public function __construct()
    {
        $this->model = new User();
    }

    public function create($attributes)
    {
        $roleId = $attributes["role_id"];
        $userValues = array_except($attributes, "role_id");
        $this->model = $this->model->create($userValues);
        $this->model->roles()->sync(array($roleId));
        return $this->model;
    }

    public function update($id, $attributes)
    {
        $this->model = $this->model->find($id);
        $roleId = $attributes["role_id"];
        $this->model->roles()->sync(array($roleId));
        $userValues = array_except($attributes, "role_id");
        return $this->model->fill($userValues)->save();
    }

}