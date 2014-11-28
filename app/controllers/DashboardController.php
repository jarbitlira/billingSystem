<?php

/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 20/11/2014
 * Time: 10:11 PM
 */
class DashboardController extends \BaseController
{

//    protected $layout = 'layouts.dashboard';
    protected $layout = 'admin.layouts.main';

    public function __construct()
    {
    }

    public function index()
    {
        $this->layout->content = \View::make('admin.dashboard.index');
    }
}