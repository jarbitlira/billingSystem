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
    protected $layout = 'layouts.main';
    protected $product;

    public function __construct()
    {
        $this->product = new Product();

    }

    public function index()
    {
        $products = $this->product->all()->toArray();
        $this->layout->content = \View::make('products.index', compact('products'));
    }
}