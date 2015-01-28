<?php
/**
 * Created by PhpStorm.
 * User: Yass
 * Date: 01-23-15
 * Time: 01:28 AM
 */

use Repositories\Administrator\ProductRepository;
use Repositories\Administrator\ProductCategoryRepository;
use Repositories\Administrator\ProviderRepository;
class PrintController extends \BaseController
{

   protected $product, $categories, $providers;

    public function __construct(ProductRepository $product, ProductCategoryRepository $categories, ProviderRepository $providers)
    {
        $this->product = $product;
        $this->categories = $categories;
        $this->providers = $providers;
    }

    public function getProducts()
    {
        $products = $this->product->getAll()->paginate(10);
        $categories = $this->categories->lists();
        $pdf = PDF::loadView('reports.product_report', compact('products', 'categories'));
        // $pdf = PDF::loadView("reports.product_report", compact('products', 'categories'));
        // $pdf = PDF::loadHTML(View::make("reports.product_report", compact('products', 'categories')));
        //$pdf = PDF::loadHTML($codigo);
        return $pdf->stream("factura.pdf");
    }
}