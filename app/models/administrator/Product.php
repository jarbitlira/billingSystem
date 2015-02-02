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
    public static $rules = array(
        'unit_price' => 'required|numeric',
        'measure_size' => 'required|numeric',
        'measure_id' => 'required|numeric',
        'current_stock' => 'required|numeric',
        'min_stock' => 'required|numeric',
        'max_stock' => 'required|numeric',
        'category_id' => 'required',
        'provider_id' => 'required'
    );
    protected $table = 'products';

    public function category()
    {
        return $this->belongsTo('Administrator\ProductCategory', 'category_id');
    }

    public function measure()
    {
        return $this->belongsTo('Measure', 'measure_id');
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