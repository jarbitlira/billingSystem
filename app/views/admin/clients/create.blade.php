@section('page-top')
    <div class="col-xs-10">
        <h1 class="page-title"> Add new Client</h1>
    </div>
@endsection

<div class="panel-body">
    {{ Form::open(['method'=>'POST', 'route'=>'client.store']) }}
        @include('admin.clients.form')
    {{ Form::close() }}
</div>