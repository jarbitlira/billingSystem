<?php

class AuthLog extends \ModelBase
{
    protected $fillable = [];
    protected $softDelete = false;

    public function beforeCreate()
    {
    }
}