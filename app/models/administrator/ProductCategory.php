<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 26/12/2014
 * Time: 11:10 PM
 */
namespace Administrator;
class ProductCategory extends \ModelBase
{
    public static $rules = array(
        'name' => 'required' // |alpha_dash|string
    );
    protected $table = 'product_categories';

    public function products(){
        return $this->hasMany('Administrator\Product', 'category_id');
    }


}