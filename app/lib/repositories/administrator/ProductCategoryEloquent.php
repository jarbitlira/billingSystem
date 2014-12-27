<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 26/12/2014
 * Time: 11:07 PM
 */
namespace Repositories\Administrator;
use Administrator\ProductCategory;

class ProductCategoryEloquent extends \Repositories\BaseRepository implements ProductCategoryRepository
{
    public function __construct()
    {
        $this->model = new ProductCategory;
    }
}