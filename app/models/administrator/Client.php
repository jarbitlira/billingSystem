<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 31/12/2014
 * Time: 02:37 PM
 */

namespace Administrator;


class Client extends \ModelBase{

    public static $rules = array(
        'name' => 'required|alpha',
        'email' => 'required|email',
        'phone1' => ['required', 'regex:/^[1-9]{4}-[0-9]{4}|[1-9]{8}$/'],
        'phone2' => ['regex:/^[1-9]{4}-[0-9]{4}|[1-9]{8}$/']
    );

}