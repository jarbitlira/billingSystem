<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 27/11/2014
 * Time: 06:40 PM
 */

use Illuminate\Support\Facades\Input;
use Repositories\ProductRepository;

class ProductsController extends BaseController
{
    protected $layout = 'admin.layouts.main';
    protected $product;

    public function __construct(ProductRepository $product)
    {
        $this->product = $product;
    }

    public function index()
    {
        $products = $this->product->getAll();
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