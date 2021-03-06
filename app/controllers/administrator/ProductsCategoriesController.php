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
        $this->beforeFilter("read_product_category", array("only" => array("index", "show")));
        $this->beforeFilter("create_product_category", array("only" => array("create", "store")));
        $this->beforeFilter("update_product_category", array("only" => array("edit", "update")));
        $this->beforeFilter("update_product_category", array("only" => array("edit", "update")));
        $this->beforeFilter("delete_product_category", array("only" => "destroy"));
        $this->category = $category;
    }

    public function index()
    {
        $categories = $this->category->getAll()->paginate(10);
        $this->layout->content = \View::make('admin.products.categories.index', compact('categories'));
    }

    public function create()
    {
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.products.categories.create');
    }

    public function store()
    {
        $input = array_except(\Input::all(), ['_token']);
        $this->category->create($input);
        if ($this->category->succeeded()) {
            return \Redirect::to('product/category')->with('notice', 'Category was created successfully');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->category->errors());
        }
    }

    public function edit($id)
    {
        $category = $this->category->findById($id);
        $this->layout->breadcrumbs = $this->breadcrumbs;
        $this->layout->content = \View::make('admin.products.categories.edit', compact('category'));
    }

    public function update($id)
    {
        $input = array_except(\Input::all(), ['_method', '_token']);
        $this->category->update($id, $input);
        if ($this->category->succeeded()) {
            return \Redirect::to('product/category')->with('notice', 'Category was updated successfully');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->category->errors());
        }
    }

    public function destroy($id)
    {
        if ($this->category->delete($id)) {
            return \Redirect::to('product/category')->with('notice', 'Category', 'Category was deleted successfully');
        } else {
            return \Redirect::back()->withInput()->with('errors', $this->category->errors());
        }
    }
}