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

    public function groupByDate($day, $month, $year)
    {
        return $this->model
            ->whereRaw('DAY(created_at) = ' . $day)
            ->whereRaw('MONTH(created_at) = ' . $month)
            ->whereRaw('YEAR(created_at) = ' . $year)
            ->get();
    }
}