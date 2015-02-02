<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 29/12/2014
 * Time: 11:39 PM
 */
namespace Administrator;
use Repositories\Administrator\ProviderRepository;

class ProviderController extends \BaseController
{

    protected $layout = 'admin.layouts.main';
    protected $breadcrumbs = ['Dashboard' => '/', 'Providers' => 'provider'];
    protected $provider;

    public function __construct(ProviderRepository $provider)
    {
        $this->provider = $provider;
    }

    public function index()
    {
        $providers = $this->provider->getAll();
        $totalProviders = $providers->get();
        $providers = $providers->paginate(10);
        $this->layout->content = \View::make('admin.providers.index', compact('totalProviders', 'providers'));
    }

    public function create()
    {
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.providers.create')->with('title', 'Create provider');
    }

    public function store()
    {
        $input = array_except(\Input::all(), ['_method', '_token']);
        $this->provider->create($input);
        if ($this->provider->succeeded()) {
            return \Redirect::to('provider');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->provider->errors());
        }
    }

    public function edit($id)
    {
        $provider = $this->provider->findById($id);
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.providers.edit', compact('provider'))
            ->with(
                'title',
                'Edit provider'
            );
    }

    public function update($id)
    {
        $input = array_except(\Input::all(), ['_method', '_token']);
        $this->provider->update($id, $input);
        if ($this->provider->succeeded()) {
            return \Redirect::to('provider');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->provider->errors());
        }
    }

    public function destroy($id)
    {
        if ($this->provider->delete($id)) {
            return \Redirect::to('provider');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->provider->errors());
        }
    }
}