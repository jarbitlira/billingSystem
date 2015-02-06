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
        $this->beforeFilter("read_client", array("only" => array("index", "show")));
        $this->beforeFilter("create_client", array("only" => array("create", "store")));
        $this->beforeFilter("update_client", array("only" => array("edit", "update")));
        $this->beforeFilter("update_client", array("only" => array("edit", "update")));
        $this->beforeFilter("delete_client", array("only" => "destroy"));
        $this->client = $client;
    }

    public function index()
    {
        $clients = $this->client->getAll()->paginate(10);
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.clients.index', compact('clients'));
    }

    public function create()
    {
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.clients.create');
    }

    public function store()
    {
        $input = array_except(\Input::all(), ['_token', '_method']);
        $this->client->create($input);
        if ($this->client->succeeded()) {
            return \Redirect::to('client')->with('notice', 'Client was created successfully');
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
            return \Redirect::to('client')->with('notice', 'Client was saved successfully');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->client->errors());
        }
    }

    public function destroy($id)
    {
        if ($this->client->delete($id)) {
            return \Redirect::to('client')->with('notice', 'Client was deleted successfully');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->client->errors());
        }
    }

    public function json()
    {
        if (\Input::has('term')) {
            $match = \Input::get('term');
            $clients = $this->client->whereLike(['name'], $match)->get();
        } else {
            $clients = $this->client->lists();
        }
        if (count($clients))
        {
            return \Response::json($clients);
        } else {
            return \Response::json(['status' => 0, 'items' => 'No data']);
        }
    }
}