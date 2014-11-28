<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 27/11/2014
 * Time: 06:40 PM
 */
use \Product;

class ProductsController extends BaseController
{
    protected $layout = 'admin.layouts.main';
    protected $product;

    public function __construct()
    {
        $this->product = new product;
    }

    public function index()
    {
        $products = $this->product->all();
        $this->layout->content = \View::make('admin.products.index', compact('products'));
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $this->layout->content = \View::make('admin.products.edit', compact('product'));
    }
}