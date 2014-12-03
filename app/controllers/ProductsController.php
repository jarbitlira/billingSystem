<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 27/11/2014
 * Time: 06:40 PM
 */

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

    public function create()
    {
        $this->layout->content = \View::make('admin.products.create')->with('title', 'New Product');
    }

    public function store()
    {
        $except = array_merge( ['_token']);
        $input = array_except( Input::all() , $except);
        $this->product->save($input);
//        dd($product);
    }

    public function edit($id)
    {
        $product = $this->product->find($id);
        $this->layout->content = \View::make('admin.products.edit', compact('product'));
    }

    public function update($id)
    {
    }

    public function destroy()
    {
    }
}