<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 27/11/2014
 * Time: 06:40 PM
 */
namespace Administrator;
use Repositories\Administrator\ProductRepository;
use Repositories\Administrator\ProductCategoryRepository;
use Repositories\Administrator\ProviderRepository;

class ProductsController extends \BaseController
{
    protected $layout = 'admin.layouts.main';
    protected $breadcrumbs = ['Dashboard' => '/', 'Products' => 'product'];
    protected $product, $categories, $providers;

    public function __construct(ProductRepository $product, ProductCategoryRepository $categories, ProviderRepository $providers)
    {
        $this->product = $product;
        $this->categories = $categories;
        $this->providers = $providers;
    }

    public function index()
    {
        $products = $this->product->getAll()->paginate(10);
        $categories = $this->categories->lists();
        $this->layout->content = \View::make('admin.products.index', compact('products', 'categories'));
    }

    public function create()
    {
        $categories = $this->categories->lists();
        $providers = $this->providers->lists();
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.products.create', compact('categories', 'providers'));
    }

    public function store()
    {
        $except = ['_token', '_method'];
        $input = array_except(\Input::all(), $except);
        $input['available'] = (\Input::get('available')) ? 1 : 0;
        $this->product->create($input);
        if ($this->product->succeeded()) {
            return \Redirect::to('product')->with('notice', 'Product was created successfully');
        }
    }

    public function edit($id)
    {
        $product = $this->product->findById($id);
        $categories = $this->categories->lists();
        $providers = $this->providers->lists();
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.products.edit', compact('product', 'categories', 'providers'));
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
            return \Redirect::to('product')->with('Product was deleted successfully');
        } else {
            return \Redirect::back()->with('errors', $this->product->errors());
        }
    }
}