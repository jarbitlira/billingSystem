@section('page-top')
<div class="col-xs-8">
    <h1 class="page_title">Edit Product <b>{{$product->name}}</b></h1>
    <p class="text-muted">Lorem ipsum dolor sit amet&hellip;</p>
</div>
@endsection

<div class="panel-body">
    {{ Form::model($product, ['method' => 'PUT', 'id'=>'updateProduct', 'route' => ['product.update', $product->id ]] ) }}
    @include('admin.products.form')
    {{ Form::close() }}
</div>

