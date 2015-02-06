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
    {{ Form::open(['method'=>'POST', 'url'=>"user/$user->id/permissions"]) }}
    <div class="col-xs-12">
        <p>{{$user->first_name}} {{$user->last_name}} (
            <small>{{$user->username}}</small>
            )
        </p>
    </div>
    <div class="col-xs-3">
        <p>Roles</p>
        @foreach($roles as $role)

            <div class="checkbox">
                <label>
                    <input name="roles[]" type="checkbox" @if($user->hasRole($role->name)) checked
                           @endif value="{{$role->id}}"> {{$role->name}}
                </label>
            </div>
        @endforeach
    </div>
    <div class="col-xs-9">
        <p>Permissions</p>
        @foreach($permissions as $permissionType)
            <div class="col-xs-3">
                @foreach($permissionType as $permission)
                    <div class="checkbox">
                        <label>
                            <input name="permission[]" type="checkbox"
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
