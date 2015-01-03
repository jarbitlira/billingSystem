@section('page-top')
    <div class="col-xs-8">
        <h1 class="page-title">Edit Category</h1>
        <p class="muted">...</p>
    </div>
@endsection

<div class="panel-body">
    {{ Form::model($category, ['method'=>'PUT', 'route'=>['product.category.update', $category->id], 'id'=>'updateProductCategory']) }}
        @include('admin.products.categories.form')
    {{ Form::close() }}
</div>