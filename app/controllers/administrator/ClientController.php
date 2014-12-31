<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 31/12/2014
 * Time: 02:42 PM
 */
namespace Administrator;
use Repositories\Administrator\ClientRepository;

class ClientController extends \BaseController
{

    protected $layout = 'admin.layouts.main';
    protected $breadcrumbs = ['Dashboard' => '/', 'Clients' => 'client'];
    protected $client;

    public function __construct(ClientRepository $client)
    {
        $this->client = $client;
    }

    public function index()
    {
        $clients = $this->client->getAll()->paginate(10);
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.clients.index', compact('clients'));
    }
}