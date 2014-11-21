<?php
/**
 * Created by PhpStorm.
 * User: CarlosRenato
 * Date: 20/11/2014
 * Time: 10:09 PM
 */ ?>
@include('layouts.header')
    <!-- main content -->
    <div id="main_wrapper">
        <div class="page_content">
            <div class="container-fluid">
                {{ $content }}
            </div>
        </div>
    </div>
@include('layouts.sidenav')
@include('layouts.footer')