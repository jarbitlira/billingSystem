<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 28/11/2014
 * Time: 01:14 AM
 */


class Provider extends ModelBase
{

    protected $table = 'providers';

    public function products()
    {
        return $this->hasMany('product');
    }
} 