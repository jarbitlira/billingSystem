<?php
/**
 * Created by PhpStorm.
 * User: Yass
 * Date: 01-23-15
 * Time: 01:28 AM
 */

class PrintController extends \BaseController
{
    public function index()
    {


        $pdf = PDF::loadHTML(View::make("reports.product_report"));
        //$pdf = PDF::loadHTML($codigo);
        return $pdf->stream("factura.pdf");
    }
}