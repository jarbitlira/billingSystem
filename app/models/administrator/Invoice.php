<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 03/01/2015
 * Time: 02:13 AM
 */
namespace Administrator;
class Invoice extends \ModelBase
{

    protected $table = 'invoices';

    public function client()
    {
        return $this->belongsTo('Administrator\Client', 'client_id');
    }

    public function products()
    {
        return $this->belongsToMany('Administrator\Product', 'invoices_products');
    }

}