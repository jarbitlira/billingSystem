<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 29/12/2014
 * Time: 11:33 PM
 */

namespace Administrator;


class Provider extends \ModelBase {

    public static $rules = array(
        'name' => 'required', // |alpha_dash|string
        'email' => 'required|email',
        'phone1' => ['required', 'regex:/^[1-9]{4}-[0-9]{4}|[0-9]{8}$/'],
        'phone2' => ['regex:/^[1-9]{4}-[0-9]{4}|[0-9]{8}$/']
    );

    public function products(){
        return $this->hasMany('product', 'provider_id');
    }


}