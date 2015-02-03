@section('page-top')
    <div class="col-xs-10">
        <h1 class="page_title">Manage product categories </h1>

        <p class="text-muted">There are {{ count($categories) }} <a
                    href="{{ URL::to( 'product/category') }}">categories </a>in stock</p>
    </div>
    <div class="col-xs-2 text-right">
        <a href="{{ URL::to('product/category/create') }}" class="btn btn-success">Add Category</a>
    </div>
@endsection

<div class="table-responsive">
    <table class="table info_table">
        <thead>
        <tr>
            <th class="sub_col">Name</th>
            <th class="sub_col">Products</th>
            <th class="sub_col">Created</th>
            <th class="sub_col">Created by</th>
            <th class="sub_col">Updated by</th>
            <th class="sub_col"> Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td class="sub_col">
                    {{ $category->name }}
                </td>
                <td class="sub_col">
                    {{ count($category->products)  }}
                </td>
                <td class="sub_col">
                    {{ $category->created_at->format('d-m-Y') }}
                </td>
                <td class="sub_col">
                    {{ $category->createdBy->username }}
                </td>
                <td class="sub_col">
                    {{ $category->updatedBy->username }}
                </td>
                <td class="sub_col">
                    <div class="btn-group">
                        {{ Form::open(['method' => 'DELETE','route' => ['product.category.destroy', $category->id ]]) }}
                        <a href="{{ ('/product/category/'.$category->id.'/edit') }}"
                           class="btn btn-xs"><i class="fa fa-pencil"></i></a>
                        <button class="btn btn-xs" type="submit"><i class="fa fa-close"></i>
                        </button>
                        {{ Form::close() }}
                    </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
<div class="text-center">
    {{ $categories->links() }}
</div>