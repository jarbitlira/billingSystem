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
    {{ Form::open(['method'=>'POST', 'url'=>"role/$role->id/permissions"]) }}
    <div class="col-xs-12">
        <h4>{{$role->name}}</h4>
    </div>
    <div class="col-xs-9">
        <p>Permissions</p>
        @foreach($permissions as $permissionType)
            <div class="col-xs-3">
                @foreach($permissionType as $permission)
                    <div class="checkbox">
                        <label>
                            {{--@if(array_where($role->perms(),function($key){--}}
                            {{--echo $key;--}}
                            {{--return $key["name"] == $permission;--}}
                            {{--}))--}}
                            <input name="permission[]" type="checkbox"
                            @if($role->hasPermission($permission))
                                   checked=""
                                   @endif
                                   value="{{$permission->id}}"> {{$permission->display_name}}
                        </label>
                    </div>
                @endforeach
            </div>

        @endforeach
    </div>
    <div class="col-xs-12">
        <div class="row pull-right">
            <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>

    {{ Form::close() }}
</div>
