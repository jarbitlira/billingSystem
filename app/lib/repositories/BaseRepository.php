<?php
/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 27/11/2014
 * Time: 18:41
 */

namespace Repositories;


class BaseRepository
{

    protected $model = null;

    public function getAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes)
    {
        return $this->model->create($attributes);
    }

    public function update($id, $attributes)
    {
        $this->model = $this->model->find($id);
        return $this->model->fill($id, $attributes)->save();
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function succeeded()
    {
        return !$this->model->hasErrors();
    }

    public function errors()
    {
        return $this->model->hasErrors();
    }


} 