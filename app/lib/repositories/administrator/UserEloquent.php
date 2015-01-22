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

    public $rules;

    public function __construct()
    {
        $this->model = new User();
        $this->rules = $this->model->rules();
    }
}