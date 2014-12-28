 <div id="main_wrapper">
        {{-- Create @section for this--}}
        <div class="page_bar clearfix">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page_title">{{ $title }}</h1>
                    <p class="text-muted">Insert data of new Product</p>
                </div>
            </div>
        </div>
        {{-- Create @section for this--}}
        <nav class="breadcrumbs">
            <ul>
                <li><a href="{{ URL::to('product') }}">Products list</a></li>
                <li class="sep">\</li>
                <li>Create Product</li>
            </ul>
        </nav>

        {{-- --}}
            <div class="page_content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="panel panel-default">
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
                        </div>

                    </div>
                </div>
            </div>



</div>