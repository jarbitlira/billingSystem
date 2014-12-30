<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 29/12/2014
 * Time: 11:30 PM
 */
namespace Repositories\Administrator;
use Administrator\Provider;

class ProviderEloquent extends \Repositories\BaseRepository implements ProviderRepository
{

    public function __construct()
    {
        $this->model = new Provider();
    }
}