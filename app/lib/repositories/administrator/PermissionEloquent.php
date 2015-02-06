<?php
/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 05/02/2015
 * Time: 12:07
 */

namespace Repositories\Administrator;

use Repositories\BaseRepository;

class PermissionEloquent extends BaseRepository implements PermissionRepository
{
    public function __construct()
    {
        $this->model = new \Permission();
    }

}