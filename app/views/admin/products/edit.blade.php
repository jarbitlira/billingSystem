<div id="main_wrapper">
    <form>
        <div class="page_bar clearfix">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page_title">{{ $product->name }}</h1>
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
                <li>Product Edit</li>
            </ul>
        </nav>
        <div class="page_content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="tabbable tabs-left">
                                    <ul class="nav nav-tabs">
                                        <li class="active"><a data-toggle="tab" href="#prod_tab_general" class="tab-default">General</a></li>
                                        <li><a data-toggle="tab" href="#prod_tab_data" class="tab-default">Data</a></li>
                                        <li><a data-toggle="tab" href="#prod_tab_links" class="tab-default">Links</a></li>
                                        <li><a data-toggle="tab" href="#prod_tab_images" class="tab-default">Images</a></li>
                                        <li><a data-toggle="tab" href="#prod_tab_discount" class="tab-default">Discount</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <div id="prod_tab_general" class="tab-pane active">
                                            <div class="form-group">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <label for="p_name" class="req">Product name</label>
                                                        <input type="text" id="p_name" class="form-control" value="{{ $product->name }}">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="p_model">Model</label>
                                                        <input type="text" id="p_model" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-sep">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="p_description" class="req">Product description</label>
                                                        <textarea name="p_description" id="p_description" cols="30" rows="4" class="form-control">{{$product->description}}
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group form-sep">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <label for="p_keywords">Keywords</label>
                                                        <input type="text" id="p_keywords" class="form-control" value="blue,yellow">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="prod_tab_data" class="tab-pane">
                                            <div class="form-group">
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label for="p_sku">SKU</label>
                                                            <input type="text" id="p_sku" class="form-control" value="{{$product->sku}}">
                                                            <span class="help-block">Stock Keeping Unit</span>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label for="p_ean">Length</label>
                                                            <input type="text" id="p_ean" class="form-control" value="{{$product->length}}">
                                                            <span class="help-block">EAN European Article Number</span>
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label for="p_isbn">Weigth</label>
                                                            <input type="text" id="p_isbn" class="form-control" value="{{$product->weight}}">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label for="p_mpn">MPN</label>
                                                            <input type="text" id="p_mpn" class="form-control" value="{{$product->provider->name}}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group form-sep">
                                                    <div class="row">
                                                        <div class="col-lg-3">
                                                            <label for="p_date_available">Date Available</label>
                                                            <input type="text" id="p_date_available" class="form-control">
                                                        </div>
                                                        <div class="col-lg-3">
                                                            <label>Requires Shipping</label>
                                                            <input class="bs_switch" type="checkbox" name="p_req_shipping" id="p_req_shipping" data-on-color="success" data-on-text="Yes" data-off-text="No">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="prod_tab_links" class="tab-pane">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <label for="p_category">Category</label>
                                                    <div class="sepH_a">
                                                        <a href="#" class="btn btn-link btn-xs" id="p_cat_select_all">Select All</a>
                                                        <a href="#" class="btn btn-link btn-xs" id="p_cat_deselect_all">Deselect All</a>
                                                    </div>
                                                    <select name="p_category" id="p_category" multiple>
                                                        <optgroup label="Category A">
                                                            <option value="subcat_a1">Quia tempore iste tempora.</option>
                                                            <option value="subcat_a2">Qui et quaerat.</option>
                                                            <option value="subcat_a3">Dolorem tempore alias eaque.</option>
                                                            <option value="subcat_a4">Dolore est cupiditate autem.</option>
                                                            <option value="subcat_a5">Voluptatibus saepe libero.</option>
                                                        </optgroup>
                                                        <optgroup label="Category B">
                                                            <option value="subcat_b1">Qui eligendi exercitationem quibusdam veritatis nisi.</option>
                                                            <option value="subcat_b2">Qui neque sint.</option>
                                                            <option value="subcat_b3">Explicabo consequatur qui sed et.</option>
                                                        </optgroup>
                                                    </select>
                                                </div>
                                                <div class="col-lg-6">
                                                    <label for="p_related_products">Related Products</label>
                                                    <div class="sepH_a">
                                                        <a href="#" class="btn btn-link btn-xs" id="p_related_select_5">Select 5 products</a>
                                                        <a href="#" class="btn btn-link btn-xs" id="p_related_deselect_5">Deselect 5 products</a>
                                                    </div>
                                                    <select name="p_related_products" id="p_related_products" multiple>
                                                            <option value="prod_1">Ea rerum quo at et.</option>
                                                            <option value="prod_2">Pariatur est error.</option>
                                                            <option value="prod_3">Quisquam praesentium in.</option>
                                                            <option value="prod_4">Ipsum eius fugiat.</option>
                                                            <option value="prod_5">Dolor quam sequi omnis.</option>
                                                            <option value="prod_6">Ad quo minima sequi.</option>
                                                            <option value="prod_7">Eligendi excepturi nam.</option>
                                                            <option value="prod_8">Laboriosam at tempore vel.</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="prod_tab_images" class="tab-pane">
                                            <div class="fileinput-button btn btn-success sepH_b">
                                                <i class="fa fa-plus"></i>
                                                <span>Add files...</span>
                                                <input id="image_upload" type="file" name="files[]" multiple>
                                            </div>
                                            <ul class="img-grid clearfix" id="img_grid_upload">
                                                <li><a href="assets/img/examples/big_image_800x600.gif"><img src="assets/img/examples/image_220x220.gif" class="thumbnail img-responsive" alt=""/></a></li>
                                                <li><a href="assets/img/examples/big_image_800x600.gif"><img src="assets/img/examples/image_220x220.gif" class="thumbnail img-responsive" alt=""/></a></li>
                                                <li><a href="assets/img/examples/big_image_800x600.gif"><img src="assets/img/examples/image_220x220.gif" class="thumbnail img-responsive" alt=""/></a></li>
                                                <li><a href="assets/img/examples/big_image_800x600.gif"><img src="assets/img/examples/image_220x220.gif" class="thumbnail img-responsive" alt=""/></a></li>
                                                <li><a href="assets/img/examples/big_image_800x600.gif"><img src="assets/img/examples/image_220x220.gif" class="thumbnail img-responsive" alt=""/></a></li>
                                                <li><a href="assets/img/examples/big_image_800x600.gif"><img src="assets/img/examples/image_220x220.gif" class="thumbnail img-responsive" alt=""/></a></li>
                                                <li><a href="assets/img/examples/big_image_800x600.gif"><img src="assets/img/examples/image_220x220.gif" class="thumbnail img-responsive" alt=""/></a></li>
                                                <li><a href="assets/img/examples/big_image_800x600.gif"><img src="assets/img/examples/image_220x220.gif" class="thumbnail img-responsive" alt=""/></a></li>
                                                <li><a href="assets/img/examples/big_image_800x600.gif"><img src="assets/img/examples/image_220x220.gif" class="thumbnail img-responsive" alt=""/></a></li>
                                            </ul>
                                        </div>
                                        <div id="prod_tab_discount" class="tab-pane">
                                            <div class="table-responsive">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Customer Group</th>
                                                            <th>Quantity</th>
                                                            <th>Priority</th>
                                                            <th>Price</th>
                                                            <th>Date start/end</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr id="discount_row_1">
                                                            <td>
                                                                <select name="discount_group_h9dpg5knk" id="discount_group_h9dpg5knk" class="form-control">
                                                                    <option value="">---</option>
                                                                    <option value="1" selected>General</option>
                                                                    <option value="2">Retailer</option>
                                                                    <option value="3">Wholesale</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control" value="12"></td>
                                                            <td><input type="text" class="form-control" value="1"></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon input-group-primary"><i class="fa fa-dollar"></i></span>
                                                                    <input type="text" class="form-control" value="12.33">
                                                                </div>
                                                            </td>
                                                            <td><input type="text" class="form-control discound_date_range"></td>
                                                            <td><a href="#" class="btn btn-sm btn-default tr_remove">Remove</a></td>
                                                        </tr>
                                                        <tr id="discount_row_2">
                                                            <td>
                                                                <select name="discount_group_sj3cwamxt" id="discount_group_sj3cwamxt" class="form-control">
                                                                    <option value="">---</option>
                                                                    <option value="1">General</option>
                                                                    <option value="2" selected>Retailer</option>
                                                                    <option value="3">Wholesale</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control" value="4"></td>
                                                            <td><input type="text" class="form-control" value="2"></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon input-group-primary"><i class="fa fa-dollar"></i></span>
                                                                    <input type="text" class="form-control" value="14.83">
                                                                </div>
                                                            </td>
                                                            <td><input type="text" class="form-control discound_date_range"></td>
                                                            <td><a href="#" class="btn btn-sm btn-default tr_remove">Remove</a></td>
                                                        </tr>
                                                        <tr id="discount_row_3">
                                                            <td>
                                                                <select name="discount_group_i1l1i6hzm" id="discount_group_i1l1i6hzm" class="form-control">
                                                                    <option value="">---</option>
                                                                    <option value="1">General</option>
                                                                    <option value="2">Retailer</option>
                                                                    <option value="3" selected>Wholesale</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control" value="7"></td>
                                                            <td><input type="text" class="form-control" value="2"></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon input-group-primary"><i class="fa fa-dollar"></i></span>
                                                                    <input type="text" class="form-control" value="22.96">
                                                                </div>
                                                            </td>
                                                            <td><input type="text" class="form-control discound_date_range"></td>
                                                            <td><a href="#" class="btn btn-sm btn-default tr_remove">Remove</a></td>
                                                        </tr>
                                                        <tr id="tr_add">
                                                            <td colspan="5"></td>
                                                            <td><a href="#" class="btn btn-sm btn-primary" id="tr_add_btn">Add discount</a></td>
                                                        </tr>
                                                        <tr id="tr_clone" style="display:none">
                                                            <td>
                                                                <select name="clone_id" id="clone_id" class="form-control">
                                                                    <option value="" selected>---</option>
                                                                    <option value="1">General</option>
                                                                    <option value="2">Retailer</option>
                                                                    <option value="3">Wholesale</option>
                                                                </select>
                                                            </td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td><input type="text" class="form-control" value=""></td>
                                                            <td>
                                                                <div class="input-group">
                                                                    <span class="input-group-addon input-group-primary"><i class="fa fa-dollar"></i></span>
                                                                    <input type="text" class="form-control" value="">
                                                                </div>
                                                            </td>
                                                            <td><input type="text" class="form-control discound_date_range"></td>
                                                            <td><a href="#" class="btn btn-sm btn-default tr_remove">Remove</a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</div>