<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 26/12/2014
 * Time: 10:41 PM
 */

namespace Administrator;
use Repositories\Administrator\ProductCategoryRepository;

class ProductsCategoriesController extends \BaseController{

    protected $layout = 'admin.layouts.main';
    protected $category;

    public function __construct(ProductCategoryRepository $category){
        $this->category = $category;
    }

    public function index(){
        $categories = $this->category->getAll();
        $this->layout->content = \View::make('admin.products.categories.index', compact('categories'));
    }

}