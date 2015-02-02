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
use Repositories\Administrator\InvoiceRepository;
class PrintController extends \BaseController
{

   protected $product, $categories, $providers, $invoice;

    public function __construct(ProductRepository $product, ProductCategoryRepository $categories, ProviderRepository $providers, InvoiceRepository $invoice)
    {
        $this->product = $product;
        $this->categories = $categories;
        $this->providers = $providers;
        $this->invoice = $invoice;

    }

    public function getProducts()
    {
        $products = $this->product->getAll()->get();
        $categories = $this->categories->lists();
        $pdf = PDF::loadView('reports.product_report', compact('products', 'categories'));
        return $pdf->stream("reporteproductos_".date("d-m-Y") . ".pdf");
    }

    public function getInvoice($id, $created_at)
    {
        $invoice = $this->invoice->findById($id);
        $seller = $invoice->user;
             $pdf = PDF::loadView('reports.invoice_report', compact('invoice', 'seller'));
            $date = $created_at;
            $date =
             $name= "factura_" . $id ."_" . $created_at . ".pdf";
        return $pdf->stream($name);

    }


}