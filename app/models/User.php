<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends ModelBase implements UserInterface, RemindableInterface
{
    /**
     * The rules for  the model.
     *
     * @var array
     */

    public static $rules = [
        'username' => 'required|unique:users,id,username',
        'email' => 'required|unique:users,id,email|email',
        'password' => 'min:5|required|confirmed',
        'password_confirmation' => 'min:5|required|same:password'
    ];

    use UserTrait, RemindableTrait;
    use HasRole;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = array('password', 'password_confirmation', 'remember_token');

    public function beforeCreate()
    {
    }

    public function afterValidate()
    {
        unset($this->password_confirmation);
    }

    public function beforeSave()
    {
        $this->password = Hash::make($this->password);
    }
}
