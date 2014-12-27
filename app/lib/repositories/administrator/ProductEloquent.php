<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 10/12/2014
 * Time: 12:02 AM
 */

namespace Repositories\Administrator;
use Administrator\Product;

class ProductEloquent extends \Repositories\BaseRepository implements ProductRepository{

    public function __construct(){
        $this->model = new Product;
    }

} 