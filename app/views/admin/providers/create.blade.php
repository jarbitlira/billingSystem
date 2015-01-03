@section('page-top')
    <div class="col-xs-8">
        <h1 class="page-title"> {{ $title }}</h1>
    </div>
@endsection

<div class="panel-body">
    {{ Form::open(['method'=>'POST', 'route'=>'provider.store']) }}
        @include('admin.providers.form')
    {{ Form::close() }}
</div>