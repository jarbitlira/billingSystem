<?php
/**
 * Created by PhpStorm.
 * User: Jarbit
 * Date: 04/02/2015
 * Time: 14:36
 */
?>
@section('page-top')
    <div class="col-xs-7">
        <h1 class="page-title"> {{ $title }}</h1>
    </div>
@endsection

<div class="panel-body">
    {{ Form::model($user, ['method'=>'PUT', 'route'=>['user.update', $user->id]]) }}
    @include('admin.users.form')
    {{ Form::close() }}
</div>