<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 10/12/2014
 * Time: 12:02 AM
 */
namespace Repositories\Administrator;
use Administrator\Product;

class ProductEloquent extends \Repositories\BaseRepository implements ProductRepository
{

    public function __construct()
    {
        $this->model = new Product();
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
        )->get();
    }
}