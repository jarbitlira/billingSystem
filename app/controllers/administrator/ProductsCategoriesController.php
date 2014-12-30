<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 26/12/2014
 * Time: 10:41 PM
 */
namespace Administrator;
use Repositories\Administrator\ProductCategoryRepository;

class ProductsCategoriesController extends \BaseController
{

    protected $layout = 'admin.layouts.main';
    protected $breadcrumbs = ['Products' => 'product', 'Categories' => 'product/category'];
    protected $category;

    public function __construct(ProductCategoryRepository $category)
    {
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->getAll();
        $this->layout->content = \View::make('admin.products.categories.index', compact('categories'))
            ->with('title', 'Manage product categories');
    }

    public function create()
    {
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.products.categories.create')
            ->with('title', 'Create Category');
    }

    public function store()
    {
        $input = array_except(\Input::all(), ['_token']);
        $this->category->create($input);
        if ($this->category->succeeded()) {
            return \Redirect::to('product/category');
        }
    }

    public function edit($id)
    {
        $category = $this->category->findById($id);
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.products.categories.edit', compact('category'))
            ->with('title', 'Edit Category');
    }

    public function update($id)
    {
        $input = array_except(\Input::all(), ['_method', '_token']);
        $this->category->update($id, $input);
        if ($this->category->succeeded()) {
            return \Redirect::to('product/category');
        } else {
            return \Rediret::back()->withInput()->with('errors', $this->category->errors());
        }
    }

    public function destroy($id)
    {
        if ($this->category->delete($id)) {
            return \Redirect::to('product/category');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->category->errors());
        }
    }
}