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
        $clients = $this->client->getAll()->paginate(1);
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.clients.index', compact('clients'))->with(
            'title',
            'Manage clients'
        );
    }

    public function create()
    {
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.clients.create')->with('title', 'Add new Client');
    }

    public function store()
    {
        $input = array_except(\Input::all(), ['_token', '_method']);
        $this->client->create($input);
        if ($this->client->succeeded()) {
            return \Redirect::to('client');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->client->errors());
        }
    }

    public function edit($id)
    {
        $client = $this->client->findById($id);
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.clients.edit', compact('client'));
    }

    public function update($id)
    {
        $input = array_except(\Input::all(), ['_method', '_token']);
        $this->client->update($id, $input);
        if ($this->client->succeeded()) {
            return \Redirect::to('client');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->client->errors());
        }
    }

    public function destroy($id)
    {
        if ($this->client->delete($id)) {
            return \Redirect::to('client');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->client->errors());
        }
    }
}