@section('page-top')
    <div class="col-xs-10">
        <h1 class="page-title">Users List</h1>

        <p class="muted">Users registered: <b>{{ count($totalUsers) }}</b></p>
    </div>
    <div class="col-xs-2 text-right">
        <a href="{{ URL::to('user/create') }}" class="btn btn-success">Add User</a>
    </div>
@endsection

<div class="table-responsive">
    <table class="table info_table">
        <thead>
        <tr>
            <th class="sub_col">Name</th>
            <th class="sub_col">Nickname</th>
            <th class="sub_col">Email</th>
            <th class="sub_col">Created</th>
            <th class="sub_col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <th class="sub_col"> {{ $user->first_name }} {{ $user->last_name }} </th>
                <th class="sub_col"> {{ $user->username }}</th>
                <th class="sub_col"> {{ $user->email }}</th>
                <th class="sub_col"> {{ date("d-m-Y", strtotime($user->created_at)) }}</th>
                <th class="sub_col">
                    {{ Form::open(['method'=>'DELETE', 'route'=>['user.destroy', $user->id]]) }}
                    <a href="{{ URL::to('user/'.$user->id.'/edit') }}" class="btn btn-xs"><i
                                class="fa fa-pencil"></i></a>
                    <button type="submit" class="btn btn-xs text-danger"><i class="fa fa-close"></i></button>
                    {{ Form::close() }}
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="text-center">
    {{ $users->links() }}
</div>
