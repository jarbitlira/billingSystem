<?php

/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 27/11/2014
 * Time: 18:29
 */
use Illuminate\Database\Eloquent\Model as Eloquent;
use Illuminate\Validation\Validator;

class EloquentValidation extends Eloquent {

    /**
     * Error message bag
     *
     * @var Illuminate\Support\MessageBag
     */
    protected $errors;

    /**
     * Validation rules
     *
     * @var Array
     */
    protected static $rules = array();

    /**
     * Validator instance
     *
     * @var Illuminate\Validation\Validators
     */
    protected $validator;

    public function __construct(array $attributes = array(), Validator $validator = null)
    {
        parent::__construct($attributes);

        $this->validator = $validator ?: \App::make('validator');
    }

    /** RUN EVENT METHODS */
    public static function boot() {
        parent::boot();

        $myself   = get_called_class();
        $hooks    = array('before' => 'ing', 'after' => 'ed');
        $radicals = array('sav', 'validat', 'creat', 'updat', 'delet');

        foreach ($radicals as $rad) {
            foreach ($hooks as $hook => $event) {
                $method = $hook.ucfirst($rad).'e';
                if (method_exists($myself, $method)) {
                    $eventMethod = $rad.$event;
                    self::$eventMethod(function($model) use ($method){
                        return $model->$method($model);
                    });
                }
            }
        }
    }

    /**
     * Register a validating model event with the dispatcher.
     *
     * @param Closure|string $callback
     * @return void
     */
    public static function validating($callback) {
        static::registerModelEvent('validating', $callback);
    }

    /**
     * Register a validated model event with the dispatcher.
     *
     * @param Closure|string $callback
     * @return void
     */
    public static function validated($callback) {
        static::registerModelEvent('validated', $callback);
    }

    /**
     * Replacing Original Saving Method
     */
    public function save(array $options = array())
    {

        if ($this->fireModelEvent('validating') === false)
        {
            return false;
        }

        if( $this->validate() === false )
        {
            return false;
        }

        if ($this->fireModelEvent('validated') === false)
        {
            return false;
        }

        return parent::save( $options );
    }

    /**
     * Validates current attributes against rules
     */
    public function validate()
    {
        $v = $this->validator->make($this->attributes, static::$rules);

        if ($v->passes())
        {
            return true;
        }

        $this->setErrors($v->messages());

        return false;
    }

    /**
     * Set error message bag
     *
     * @var Illuminate\Support\MessageBag
     */
    protected function setErrors($errors)
    {
        $this->errors = $errors;
    }

    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors;
    }

    /**
     * Inverse of wasSaved
     */
    public function hasErrors()
    {
        return ! empty($this->errors);
    }

} 