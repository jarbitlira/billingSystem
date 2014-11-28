<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 27/11/2014
 * Time: 06:27 PM
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class Product extends Eloquent
{
    protected $table = 'product';

    public function Category()
    {
        return $this->belongsTo('product_category', 'category_id');
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