<?php

/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 20/11/2014
 * Time: 10:11 PM
 */
namespace Administrator;
use Repositories\Administrator\ClientRepository;
use Repositories\Administrator\InvoiceRepository;
use Repositories\Administrator\ProductRepository;
use Repositories\Administrator\ProviderRepository;


class DashboardController extends \BaseController
{

//    protected $layout = 'layouts.dashboard';
    protected $layout = 'admin.layouts.main';
    protected $product;
    protected $client;
    protected $invoice;
    protected $provider;

    public function __construct(
        ProductRepository $product,
        ClientRepository $client,
        InvoiceRepository $invoice,
        ProviderRepository $provider
    ) {
        $this->product = $product;
        $this->client = $client;
        $this->invoice = $invoice;
        $this->provider = $provider;
    }

    public function index()
    {
        $clients = $this->client->lists();
        $products = $this->product->lists();
        $invoices = $this->invoice->lists();
        $this->layout->content = \View::make('admin.dashboard.index', compact('clients', 'products', 'invoices'));
    }

}