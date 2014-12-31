@section('page-top')
    <div class="col-md-10">
        <h1 class="page-title">Provider List</h1>
        <p class="muted">Providers registered: <b>{{ count($providers) }}</b></p>
    </div>
    <div class="col-md-2 text-right">
        <a href="{{ URL::to('provider/create') }}" class="btn btn-success">Add Provider</a>
    </div>
@endsection

<div class="table-responsive">
    <table class="table info-table">
        <thead>
            <tr>
                <th class="sub_col">Name</th>
                <th class="sub_col">Email</th>
                <th class="sub_col">Phone 1</th>
                <th class="sub_col">Phone 2</th>
                <th class="sub_col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($providers as $provider)
            <tr>
                <th class="sub_col"> {{ $provider->name }}</th>
                <th class="sub_col"> {{ $provider->email }}</th>
                <th class="sub_col"> {{ $provider->phone1 }}</th>
                <th class="sub_col"> {{ $provider->phone2 }}</th>
                <th class="sub_col">
                    {{ Form::open(['method'=>'DELETE', 'route'=>['provider.destroy', $provider->id]]) }}
                    <a href="{{ URL::to('provider/'.$provider->id.'/edit') }}" class="btn btn-xs"><i class="fa fa-pencil"></i></a>
                    <button type="submit" class="btn btn-xs"><i class="fa fa-close"></i></button>
                    {{ Form::close() }}
                </th>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<div class="text-center">
    <ul class="pagination pagination-sm">
        <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><span>...</span></li>
        <li><a href="#">5</a></li>
        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
    </ul>
</div>