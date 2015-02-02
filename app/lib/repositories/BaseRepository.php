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

    protected $model = NULL;

    public function lists()
    {
        return $this->model->all();
    }

    public function getAll($field = NULL)
    {
        $this->orderBy($field);

        return $this->model;
    }

    public function orderBy($field)
    {
        if (!is_null($field)) {
            $this->model->orderBy($field, 'DESC'); // ->get()
        } else {
            $this->model->orderBy('id', 'DESC');
        }

        return $this->model;
    }

    public function findAll()
    {
        return $this->model->all();
    }

    public function findById($id)
    {
        return $this->model->find($id);
    }

    public function create($attributes)
    {
        $this->model = $this->model->create($attributes);
        return $this->model;
    }

    public function update($id, $attributes)
    {
        $this->model = $this->model->find($id);

        return $this->model->fill($attributes)->save();
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
        return $this->model->getErrors();
    }

    public function whereLike($fields, $match)
    {
        return $this->model->where(
            function ($query) use ($fields, $match) {
                if (is_array($fields)) {
                    foreach ($fields as $field) {
                        $query->orWhere($field, 'LIKE', "%" . $match . "%");
                    }
                } elseif (isset($fields)) {
                    $query->where($fields, 'LIKE', "%" . $match . "%");
                }
            }
        );
    }

    public function groupBy($field)
    {
        return $this->model->groupBy($field)->get();
    }
}