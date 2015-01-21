<?php

/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 27/11/2014
 * Time: 18:29
 */
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class ModelBase extends EloquentValidation
{
    use SoftDeletingTrait;

    protected $softDelete = true;
    protected $guarded = [];
    protected $defaults = [];

    public function getId()
    {
        return $this->primaryKey;
    }
} 