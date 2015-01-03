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

    protected $table = 'invoice';

    public function client()
    {
        return $this->belongsTo('client', 'client_id');
    }

//    public function products(){
//        return $this->hasMany('product', '')
//    }
}