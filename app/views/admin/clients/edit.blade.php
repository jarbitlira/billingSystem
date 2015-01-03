@section('page-top')
    <div class="col-xs-8">
        <h1 class="page-title">Edit Client <b>{{$client->name}}</b></h1>
    </div>
@endsection

<div class="panel-body">
    {{ Form::model($client, ['method'=>'PUT', 'route'=>['client.update', $client->id]]) }}
        @include('admin.clients.form')
    {{ Form::close() }}
</div>