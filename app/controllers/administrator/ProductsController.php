<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 27/11/2014
 * Time: 06:40 PM
 */
namespace Administrator;
use Illuminate\Support\Facades\Input;
use Repositories\Administrator\ProductRepository;

class ProductsController extends \BaseController
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
        $except = ['_token'];
        $input = array_except(Input::all(), $except);
        $product = $this->product->create($input);
        if ($this->product->succeeded()) {
            return \Redirect::to('product');
        }
    }

    public function edit($id)
    {
        $product = $this->product->findById($id);
        $this->layout->content = \View::make('admin.products.edit', compact('product'));
    }

    public function update($id)
    {
        $except = ['_token'];
        $input = array_except(Input::all(), $except);
        $this->product->update($id, $input);
        if ($this->product->succeeded()) {
            return \Redirect::to('product');
        } else {
            return \Redirect::back()->withInput()
                ->with('errors', $this->product->errors());
        }
    }

    public function destroy($id)
    {
        if ($this->product->delete($id)) {
            return \Redirect::to('product');
        } else {
            return \Redirect::back();
        }
    }
}