@section('page-top')
    <div class="col-xs-7">
        <h1 class="page-title"> {{ $title }}</h1>
    </div>
@endsection

<div class="panel-body">
    {{ Form::model($role, ['method'=>'PUT', 'route'=>['role.update', $role->id]]) }}
    @include('admin.roles.form')
    {{ Form::close() }}
</div>