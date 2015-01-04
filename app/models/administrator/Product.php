<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 27/11/2014
 * Time: 06:27 PM
 */
namespace Administrator;

class Product extends \ModelBase
{
    protected $table = 'product';

    public function category()
    {
        return $this->belongsTo('Administrator\ProductCategory', 'category_id');
    }

    public function provider()
    {
        return $this->belongsTo('Administrator\Provider', 'provider_id');
    }

    public function invoices()
    {
        return $this->belongsToMany('Administrator\Invoice', 'invoices_products');
    }
}