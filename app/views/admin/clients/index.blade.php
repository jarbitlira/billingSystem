@section('page-top')
    <div class="col-xs-10">
        <h1 class="page-title">Manage Clients</h1>
    </div>
    <div class="col-xs-2 text-right">
        <a class="btn btn-success" href="{{ URL::to('client/create') }}">Add Client</a>
    </div>
@endsection

<div class="panel-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone 1</th>
                    <th>Phone 2</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @if(count($clients) > 0)
            @foreach($clients as $client)
                <tr>
                    <th>{{ $client->name }}</th>
                    <th>{{ $client->email }}</th>
                    <th>{{ $client->phone1 }}</th>
                    <th>{{ $client->phone2 }}</th>
                    <th>{{ $client->created_at->format('d-m-Y') }}</th>
                    <th>
                        {{ Form::open(['method'=>'DELETE', 'route'=>['client.destroy', $client->id]]) }}
                        <a href="{{ URL::to('client/'.$client->id.'/edit') }}" class="btn btn-xs"><i class="fa fa-pencil"></i></a>
                        <button class="btn btn-xs" type="submit"><i class="fa fa-close"></i></button>
                        {{ Form::close() }}
                    </th>
                </tr>
            @endforeach
            @else
                <p class="text-center">There no clients registered</p>
            @endif
            </tbody>
        </table>
    </div>
</div>

<div class="text-center">
    {{ $clients->links() }}
</div>