<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 28/11/2014
 * Time: 01:14 AM
 */
use Illuminate\Database\Eloquent\Model as Eloquent;

class Provider extends Eloquent
{

    protected $table = 'provider';

    public function products()
    {
        return $this->hasMany('product');
    }
} 