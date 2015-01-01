<?php
namespace Repositories\Administrator;
use Administrator\Client;

class ClientEloquent extends \Repositories\BaseRepository implements ClientRepository
{

    public function __construct()
    {
        $this->model = new Client;
    }
}