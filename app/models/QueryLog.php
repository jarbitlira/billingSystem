<?php

class QueryLog extends \Eloquent
{
    protected $fillable = [];
    protected $guarded = [];

    public function beforeCreate()
    {
    }

    public function afterCreate()
    {
    }
}