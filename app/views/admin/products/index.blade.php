@section('page-top')
<div class="col-xs-10">
    <h1 class="page_title">{{ $title }}</h1>
    <p class="text-muted">{{ count($products) }} <a href="#">products</a> in {{ count($categories) }} <a href="{{ URL::to( 'product/category') }}">categories</a></p>
</div>
<div class="col-xs-2 text-right">
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
            <th class="sub_col">Length</th>
            <th class="sub_col">Weight</th>
            <th class="sub_col">Category</th>
            <th class="sub_col">Provider</th>
            <th class="sub_col">Available</th>
            <th> - </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="col_sm sub_col">
                <input type="checkbox" class="check_row" name="prod_check_1" id="prod_check_1">
            </td>
            <td class="col_sm visible-lg"><img src="assets/img/examples/image_60x60.gif" class="img-thumbnail" alt=""></td>
            <td class="sub_col">1j27a111</td>
            <td>
                <a href="newsletter_report.html">Occaecati veritatis libero.</a><br/>
                <span class="text-muted">Added 12 Feb 2014 12:45</span>
            </td>
            <td class="sub_col"><strong>C$87.72</strong></td>
            <td class="sub_col">27m</td>
            <td class="sub_col">27kg</td>
            <td class="sub_col">Category</td>
            <td class="sub_col">provider</td>
            <td class="sub_col"><span class="label label-success">enabled</span></td>
            <td class="sub_col"><a href="#" class="btn btn-default btn-sm"><span class="fa fa-pencil-square-o fa-lg"></span> Details</a></td>
        </tr>
        <tr>
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
                    {{ $product->length }}
                </td>
                <td class="sub_col">
                    {{ $product->weight }}
                </td>
                <td class="sub_col">
                    {{ $product->category->name }}
                </td>
                <td class="sub_col">
                    @if (isset($product->provider->name))
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
                        <a href="#" class="btn btn-xs"><i class="fa fa-eye"></i></a>
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
    <ul class="pagination pagination-sm">
        <li><a href="#"><i class="fa fa-angle-double-left"></i></a></li>
        <li><a href="#">1</a></li>
        <li class="active"><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><span>...</span></li>
        <li><a href="#">5</a></li>
        <li><a href="#"><i class="fa fa-angle-double-right"></i></a></li>
    </ul>
</div>