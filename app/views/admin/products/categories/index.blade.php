<div id="main_wrapper">
    <div class="page_bar clearfix">
        <div class="row">
            <div class="col-md-10">
                <h1 class="page_title">Categories list</h1>
            </div>
            <div class="col-md-2 text-right">
                <a href="{{ URL::to('product/category/create') }}" class="btn btn-success">Add Category</a>
            </div>
        </div>
    </div>
    <div class="page_content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="table-responsive">
                            <table class="table info_table">
                                <thead>
                                <tr>
                                    <th class="sub_col">Name</th>
                                    <th class="sub_col">Created</th>
                                    <th> Actions </th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($categories as $category)
                                <tr>
                                    <td class="sub_col">
                                            {{ $category->name }}
                                    </td>
                                    <td class="sub_col">
                                            {{ $category->created_at }}
                                    </td>
                                    <td class="sub_col">
                                        <div class="btn-group">
                                            {{ Form::open(['method' => 'DELETE','route' => ['product.category.destroy', $category->id ]]) }}
                                            <a href="#" class="btn btn-xs"><i class="fa fa-eye"></i></a>
                                            <a href="{{ ('product/category/'.$category->id.'/edit') }}" class="btn btn-xs"><i class="fa fa-pencil"></i></a>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>