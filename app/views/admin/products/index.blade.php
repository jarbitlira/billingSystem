@section('page-top')
<div class="col-xs-8">
    <h1 class="page_title">Manage Products</h1>

    <p class="text-muted">{{ count($productsTotal) }} <a href="{{ URL::to('product') }}">products</a>
        in {{ count($categories) }} <a href="{{ URL::to( 'product/category') }}">categories</a></p>
</div>



<div class="col-xs-4 text-right">

    <a href="{{ URL::to('print/products') }}" class="btn btn-success">Print Report</a>
    <a href="{{ URL::to('product/create') }}" class="btn btn-success">Add Product</a>

</div>
@endsection

<div class="table-responsive">
    <table class="table info_table" id="prod_table">
        <thead>
        <tr>
            <th><input type="checkbox" class="check_all" data-target-el="prod_table"></th>
            <th class="visible-lg"></th>
            <th class="sub_col">SKU</th>
            <th class="sub_col">Name</th>
            <th class="sub_col">Unit Price</th>
            <th class="sub_col">Quantity</th>
            <th class="sub_col">Category</th>
            <th class="sub_col">Provider</th>
            <th class="sub_col">Available</th>
            <th> - </th>
        </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td class="col_sm sub_col">
                    <input type="checkbox" class="check_row" name="prod_check_1" id="prod_check_1">
                </td>
                <td class="col_sm visible-lg">
                    <img src="assets/img/examples/image_60x60.gif" class="img-thumbnail" alt="">
                </td>
                <td class="sub_col">
                    {{ $product->sku }}
                </td>
                <td>
                    <h5><a href="newsletter_report.html"> {{ $product->name }} </a></h5>
                    <span class="text-muted">Added {{ $product->created_at }}</span>
                </td>
                <td class="sub_col"><strong>
                    C${{ $product->unit_price }}
                </strong></td>
                <td class="sub_col">
                    {{ $product->quantity }} @if($product->measure){{ $product->measure->abbreviation }}@endif
                </td>
                <td class="sub_col">
                    @if($product->category)
                        {{ $product->category->name }}
                    @endif
                </td>
                <td class="sub_col">
                    @if($product->provider)
                        {{ $product->provider->name }}
                    @endif
                </td>
                <td class="sub_col">
                    @if($product->available == 1)
                    <span class="label label-success"><i class="fa fa-thumbs-up"></i></span>
                    @else
                    <span class="label label-danger"><i class="fa fa-thumbs-down"></i></span>
                    @endif
                </td>
                <td class="sub_col">
                    <div class="btn-group">
                        {{ Form::open(['method' => 'DELETE','route' => ['product.destroy', $product->id ]]) }}
                        {{--<a href="#" class="btn btn-xs"><i class="fa fa-eye"></i></a>--}}
                        <a href="{{ ('product/'.$product->id.'/edit') }}" class="btn btn-xs"><i class="fa fa-pencil"></i></a>
                        <button class="btn btn-xs" type="submit"><i class="fa fa-close"></i></button>
                        {{ Form::close() }}
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="text-center">
    {{ $products->links() }}
</div>