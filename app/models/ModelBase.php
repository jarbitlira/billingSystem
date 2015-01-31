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

    protected static $rules = [];
    protected $softDelete = true;
    protected $guarded = [];
    protected $defaults = [];

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::id();
            $model->updated_by = Auth::id();
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::id();
        });
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