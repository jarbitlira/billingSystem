<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Zizaco\Entrust\HasRole;

class User extends \ModelBase implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;
	use HasRole;

	/**
	 * The rules for  the model.
	 *
	 * @var array
	 */

	protected static $rules = [
		'username' => 'required|unique:users',
		'email' => 'required|unique:users|email',
		'password' => 'min:6|required|confirmed',
		'password_confirmation' => 'min:6|required|same:password'
	];
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
	protected $hidden = array('password', 'remember_token');

	public function rules()
	{
		return static::$rules;
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
