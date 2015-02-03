<?php
/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 02/02/2015
 * Time: 23:15
 */

Validator::extend('alpha_spaces', function ($attribute, $value) {
    return preg_match('/^[\pL\s]+$/u', $value);
});