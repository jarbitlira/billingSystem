@section('page-top')
<div class="col-md-8">
    <h1 class="page_title">{{ $title . ' <b>'.$product->name.'</b>' }}</h1>
    <p class="text-muted">Lorem ipsum dolor sit amet&hellip;</p>
</div>
@endsection

<div class="panel-body">
    {{ Form::model($product, ['method' => 'PUT', 'id'=>'updateProduct', 'route' => ['product.update', $product->id ]] ) }}
    @include('admin.products.form')
    {{ Form::close() }}
</div>

