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
    protected $provider;

    public function __construct(ProviderRepository $provider)
    {
        $this->provider = $provider;
    }

    public function index(){
        $providers = $this->provider->getAll();
        $this->layout->content = \View::make('admin.providers.index', compact('providers'));

    }
}