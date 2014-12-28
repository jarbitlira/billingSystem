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

    public function Category()
    {
        return $this->belongsTo('Administrator\ProductCategory', 'category_id');
    }

    public function provider()
    {
        return $this->belongsTo('provider', 'provider_id');
    }

    public function Invoices()
    {
        return $this->belongsToMany('invoice', 'invoice_products');
    }
}