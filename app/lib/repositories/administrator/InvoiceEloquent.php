<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 03/01/2015
 * Time: 02:11 AM
 */
namespace Repositories\Administrator;
use Administrator\Invoice;

class InvoiceEloquent extends \Repositories\BaseRepository implements InvoiceRepository
{

    public function __construct()
    {
        $this->model = new Invoice;
    }
}