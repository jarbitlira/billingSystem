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
use Repositories\Administrator\ProductCategoryRepository;

class ProductsController extends \BaseController
{
    protected $layout = 'admin.layouts.main';
    protected $product;
    protected $categories;

    public function __construct(ProductRepository $product, ProductCategoryRepository $categories)
    {
        $this->product = $product;
        $this->categories = $categories;
    }

    public function index()
    {
        $products = $this->product->getAll();
        $categories = $this->categories->getAll();
        $this->layout->content = \View::make('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = $this->categories->getAll();
        $this->layout->content = \View::make('admin.products.create', compact('categories'))->with('title', 'New Product');
    }

    public function store()
    {
        $except = ['_token', '_method'];
        $input = array_except(Input::all(), $except);
        $input['available'] = (Input::get('available')) ? 1 : 0;
        $product = $this->product->create($input);
        if ($this->product->succeeded()) {
            return \Redirect::to('product');
        }
    }

    public function edit($id)
    {
        $product = $this->product->findById($id);
        $categories = $this->categories->getAll();
        $this->layout->content = \View::make('admin.products.edit', compact('product', 'categories'))->with('title', 'Edit ');
    }

    public function update($id)
    {
        $except = ['_token', '_method'];
        $input = array_except(\Input::all(), $except);
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