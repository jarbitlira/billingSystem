<?php

use Zizaco\Entrust\EntrustRole;

class Role extends EntrustRole
{
    public static $rules = [
        'name' => 'required|unique:roles,id',
    ];
    protected $guarded = [];
    protected $defaults = [];
    protected $fillable = [];

    public function beforeCreate()
    {
        $this->created_by = Auth::id();
        $this->updated_by = Auth::id();
    }

    public function beforeUpdate()
    {
        $this->updated_by = Auth::id();
    }

    public function createdBy()
    {
        return $this->belongsTo("User", "created_by");
    }

    public function updatedBy()
    {
        return $this->belongsTo("User", "updated_by");
    }

    public function hasPermission($permission)
    {
        foreach ($this->perms as $perm) {
            if ($perm->id == $permission->id) {
                return true;
            }
        }
        return false;
    }

    public function hasErrors()
    {
        $errors = $this->errors();
        return count($errors);
    }

    public function getErrors()
    {
        return $this->errors();
    }

    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

}