<?php
/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 03/01/2015
 * Time: 7:48
 */
?>

@section('page-top')
    <div class="col-xs-8">
        <h1 class="page_title">Site Config</h1>

        <p class="text-muted">Lorem ipsum dolor sit amet&hellip;</p>
    </div>
@endsection

<div class="panel-body">
    {{ Form::model($siteConfig,['url'=>['config/update']]) }}
    <div class="col-xs-12">
        <div class="row">
            <div class="col-lg-6">
                <label for="site_name" class="req">Site Name</label>
                {{ Form::text('site_name', NULL, ['class'=> 'form-control', 'id'=>'site_name', 'required'=>'required']) }}
            </div>
            <div class="col-lg-6">
                <label for="site_name" class="req">Site Header</label>
                {{ Form::text('site_header', NULL, ['class'=> 'form-control', 'id'=>'site_header', 'required'=>'required']) }}
            </div>
        </div>
    </div>
    <div class="col-xs-12">
        <div class="row text-right">
            {{ Form::submit('Save',['class'=>'btn btn-lg btn-success']) }}

            <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>

        </div>
    </div>

    {{ Form::close() }}
</div>
