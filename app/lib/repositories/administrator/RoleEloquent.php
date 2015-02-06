<?php
/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 04/02/2015
 * Time: 14:43
 */

namespace Repositories\Administrator;

use Repositories\BaseRepository;

class RoleEloquent extends BaseRepository implements RoleRepository
{

    public function __construct()
    {
        $this->model = new \Role();
    }

}