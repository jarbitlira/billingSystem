<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 29/12/2014
 * Time: 11:33 PM
 */

namespace Administrator;


class Provider extends \ModelBase {

    protected $table =  'provider';

    public function products(){
        return $this->hasMany('product', 'provider_id');
    }


}