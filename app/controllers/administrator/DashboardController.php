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
use Repositories\Administrator\ProductCategoryRepository;
use Repositories\Administrator\ProductRepository;
use Repositories\Administrator\ProviderRepository;

class DashboardController extends \BaseController
{

//    protected $layout = 'layouts.dashboard';
    protected $layout = 'admin.layouts.main';
    protected $product;
    protected $category;
    protected $client;
    protected $invoice;
    protected $provider;
    private $topCategories;

    public function __construct(
        ProductRepository $product,
        ProductCategoryRepository $category,
        ClientRepository $client,
        InvoiceRepository $invoice,
        ProviderRepository $provider
    ) {
        $this->product = $product;
        $this->category = $category;
        $this->client = $client;
        $this->invoice = $invoice;
        $this->provider = $provider;

        $this->topCategories = $this->category->getAll()->take(5)->get();
    }

    public function index()
    {
//        dd($this->browsers());
        $clients = $this->client->lists();
        $products = $this->product->lists();
        $categories = $this->topCategories;
        $invoices = $this->invoice->lists();
        $browsers = \AuthLog::select(\DB::raw('COUNT(*) as counter, browser'))->groupBy('browser')->get();
        $browsers['total'] = \AuthLog::all()->count();
        $this->layout->content = \View::make(
            'admin.dashboard.index',
            compact('clients', 'products', 'categories', 'invoices', 'browsers')
        );
    }

    public function chartsLastMonthSales()
    {
        $data = [];
        $lastMonth = \Carbon::now()->subDays(30);
        while (!$lastMonth->isTomorrow()) {
            $label = $lastMonth->format('M d');
            $day = $this->invoice->groupByDate($lastMonth->day, $lastMonth->month, $lastMonth->year);
            $sales = $day->sum('total');
            $data[] = [$label, $sales];
            $lastMonth->addDay();
        }

        return \Response::json($data);
    }

    public function topProductCategories()
    {
        $data = [];
        $data[] = ['Name', 'Products belong'];
        foreach($this->topCategories as $category){
            $data[] = [$category->name, $category->products()->count()];
        }
        return \Response::json($data);
    }

    public function browsers(){
        $data = [];
        $data[] = ['browser', 'count'];
        $browsers =  \AuthLog::select(\DB::raw('COUNT(*) as counter, browser'))->groupBy('browser');
        foreach ($browsers->get() as $item){
            $data[] = [$item->browser, $item->counter];
        }
        return \Response::json($data);
    }
}