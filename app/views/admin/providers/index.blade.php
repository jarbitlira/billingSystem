@section('page-top')
    <div class="col-xs-10">
        <h1 class="page-title">Provider List</h1>

        <p class="muted">Providers registered: <b>{{ count($totalProviders) }}</b></p>
    </div>
    <div class="col-xs-2 text-right">
        <a href="{{ URL::to('provider/create') }}" class="btn btn-success">Add Provider</a>
    </div>
@endsection

<div class="table-responsive">
    <table class="table info_table">
        <thead>
            <tr>
                <th class="sub_col">Name</th>
                <th class="sub_col">Email</th>
                <th class="sub_col">Phone 1</th>
                <th class="sub_col">Phone 2</th>
                <th class="sub_col">Registered</th>
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
                <th class="sub_col"> {{ $provider->created_at->format('d-m-Y') }}</th>
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
    {{ $providers->links() }}
    {{--@include('admin.layouts.pagination', ['model'=>$providers])--}}
</div>
