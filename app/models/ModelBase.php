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

    public static $rules = [];
    protected $softDelete = true;
    protected $guarded = [];
    protected $fillable = [];
    protected $defaults = [];

    public function beforeCreate()
    {
        $this->created_by = Auth::id();
        $this->updated_by = Auth::id();
    }

    public function beforeUpdate()
    {
        $this->updated_by = Auth::id();
    }

    public function getId()
    {
        return $this->primaryKey;
    }

    public function createdBy()
    {
        return $this->belongsTo("User", "created_by");
    }

    public function updatedBy()
    {
        return $this->belongsTo("User", "updated_by");
    }
} 