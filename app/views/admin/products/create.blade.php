 <div id="main_wrapper">
        {{-- Create @section for this--}}
        <div class="page_bar clearfix">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page_title">{{ $title }}</h1>
                    <p class="text-muted">Lorem ipsum dolor sit amet&hellip;</p>
                </div>
                <div class="col-md-4 text-right">
                    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                    <a href="<? Redirect::back() ?>" class="btn btn-default">Cancel</a>
                    <a href="javascript:void(0)" class="btn btn-link">Delete</a>
                </div>
            </div>
        </div>
        {{-- Create @section for this--}}
        <nav class="breadcrumbs">
            <ul>
                <li><a href="#">Ecommerce</a></li>
                <li class="sep">\</li>
                <li>Create Product</li>
            </ul>
        </nav>

        {{-- --}}

            <div class="page_content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="panel panel-default">
                            <div class="panel-heading">Create product</div>
                            <div class="panel-body">
                                {{ Form::open(['method' => 'POST', 'id'=>'createProduct', 'route' => 'product.store' ]) }}
                                    <div class="col-lg-7">
                                        <div class="form-group">
                                            {{--<div class="col-lg-4">--}}
                                                {{--<label for="product_sku" class="req">SKU</label>--}}
                                                {{--<input type="text" name="sku" id="product_sku" class="form-control" data-parsley-required="true">--}}
                                            {{--</div>--}}
                                            <div class="col-lg-8">
                                                <label for="product_name" class="req">Name</label>
                                                <input type="text" name="name" id="product_name" class="form-control" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col col-lg-4">
                                                <label for="product_up" class="req">Unit Price</label>
                                                <input type="text" name="unit_price" id="product_up" class="form-control" data-parsley-required="true">
                                            </div>
                                            <div class="col col-lg-4">
                                                <label for="product_name" class="req">Sale Price</label>
                                                <input type="text" id="product_name" class="form-control" data-parsley-required="true">
                                            </div>
                                            <div class="col col-lg-4">
                                                <label for="product_name" class="req">Sale Price</label>
                                                <input type="text" id="product_name" class="form-control" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col col-lg-4">
                                                <label for="product_up" class="req">Lenght</label>
                                                <input type="text" name="length" id="product_up" class="form-control" data-parsley-required="true">
                                            </div>
                                            <div class="col col-lg-4">
                                                <label for="product_name" class="req">Weight</label>
                                                <input type="text" name="weigth" id="product_name" class="form-control" data-parsley-required="true">
                                            </div>
                                            <div class="col col-lg-4">
                                                <label for="product_name" class="req">Sale Price</label>
                                                <input type="text" id="product_name" class="form-control" data-parsley-required="true">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-4">
                                                <label for="product_catgory" class="req">Category</label>
                                                {{ Form::select('category_id',
                                                				[''=>'Choose at least a category...'],
                                                				null, ["class" => "input required span12", "id" => "product_catgory"]) }}
                                                <select id="product_catgory" name='category_id' class="form-control" data-parsley-required="true" data-parsley-trigger="change">
                                                    <option value="">Select a category..</option>
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                        <option value="1" selected>Alaska</option>
                                                        <option value="2">Hawaii</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="product_provider" class="req">Provider</label>
                                                <select id="product_provider" name='provider_id' class="form-control" data-parsley-required="true" data-parsley-trigger="change">
                                                    <option value="">Select its provider . . </option>
                                                    <optgroup label="Alaskan/Hawaiian Time Zone">
                                                        <option value="1">Alaska</option>
                                                        <option value="2">Hawaii</option>
                                                    </optgroup>
                                                </select>
                                            </div>
                                            <div class="col-lg-4">
                                                <br/><label for="product_available" class="checkbox checkbox-inline">
                                                    <input type="checkbox" name="available" id="product_available"/> <b>Available</b>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="form-group">
                                            <label for="product_description">Description</label>
                                            <textarea name="description" id="product_description" cols="30" rows="4" class="form-control" data-parsley-minlength="50"  data-parsley-trigger="change"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="product_notes">Notes</label>
                                            <textarea name="notes" id="product_notes" cols="30" rows="4" class="form-control" data-parsley-minlength="50"  data-parsley-trigger="change"></textarea>
                                        </div>

                                    </div>
                                    <div class="form-sep">
                                        <button class="btn btn-primary" type="submit">Submit</button>
                                    </div>
                                {{ Form::close() }}
                            </div
                            >
                        </div>

                    </div>
                </div>
            </div>



</div>