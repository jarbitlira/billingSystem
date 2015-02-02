<?php

/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 27/11/2014
 * Time: 18:29
 */
class EloquentValidation extends Ardent
{

    /**
     * Retrieve error message bag
     */
    public function getErrors()
    {
        return $this->errors();
    }

    /**
     * Inverse of wasSaved
     */
    public function hasErrors()
    {
        $errors = $this->errors();
        return count($errors);
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

} 