@section('page-top')
    <div class="col-xs-10">
        <h1 class="page-title">Roles List</h1>

        <p class="muted">Roles registered: <b>{{ count($totalRoles) }}</b></p>
    </div>
    <div class="col-xs-2 text-right">
        <a href="{{ URL::to('role/create') }}" class="btn btn-success">Add Role</a>
    </div>
@endsection

<div class="table-responsive">
    <table class="table info_table">
        <thead>
        <tr>
            <th class="sub_col">Name</th>
            <th class="sub_col">Permissions</th>
            <th class="sub_col">Created</th>
            <th class="sub_col">Created by</th>
            <th class="sub_col">Updated by</th>
            <th class="sub_col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($roles as $role)
            <tr>
                <th class="sub_col"> {{ $role->name }} </th>
                <th class="sub_col"> {{ $role->perms->count() }}</th>
                <th class="sub_col"> {{ date("d-m-Y", strtotime($role->created_at)) }}</th>
                <th class="sub_col">@if($role->createdBy) {{ $role->createdBy->username }} @endif</th>
                <th class="sub_col">@if($role->updatedBy) {{ $role->updatedBy->username }} @endif</th>
                <th class="sub_col">
                    {{ Form::open(['method'=>'DELETE', 'route'=>['role.destroy', $role->id]]) }}
                    <a href="{{ URL::to('role/'.$role->id.'/edit') }}" class="btn btn-xs"><i
                                class="fa fa-pencil"></i></a>
                    <a href="{{ URL::to('role/'.$role->id.'/permissions') }}" class="btn btn-xs"><i
                                class="fa fa-key"></i></a>
                    <button type="submit" class="btn btn-xs text-danger"><i class="fa fa-close"></i></button>
                    {{ Form::close() }}
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="text-center">
    {{ $roles->links() }}
</div>
