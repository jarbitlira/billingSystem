@section('page-top')
    <div class="col-xs-7">
        <h1 class="page-title"> {{ $title }}</h1>
    </div>
@endsection

<div class="panel-body">
    {{ Form::model($provider, ['method'=>'PUT', 'route'=>['provider.update', $provider->id]]) }}
        @include('admin.providers.form')
    {{ Form::close() }}
</div>