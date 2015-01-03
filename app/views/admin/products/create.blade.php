@section('page-top')
<div class="col-xs-8">
    <h1 class="page_title">New Product</h1>
    <p class="text-muted">Insert data of new Product</p>
</div>
@endsection

<!--<div class="panel-heading">
<div class="row text-right">
<div class="col-lg-4">Create product</div>
    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
    <a href="<? //Redirect::back() ?>" class="btn btn-default">Cancel</a>
</div>
</div> -->
<div class="panel-body">
{{ Form::open(['method' => 'POST', 'id'=>'createProduct', 'route' => 'product.store' ]) }}
    @include('admin.products.form')
{{ Form::close() }}
</div>
