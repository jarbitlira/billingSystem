<div class="col-lg-7">
    <div class="row">
        <div class="form-group">
            <div class="col-lg-4">
                <label for="product_sku" class="req">SKU</label>
                {{ Form::text('sku', NULL, ['class'=> 'form-control', 'id'=>'product_sku', 'required'=>'required']) }}
            </div>
            <div class="col-lg-8">
                <label for="product_name" class="req">Name</label>
                {{ Form::text('name', NULL, ['class'=>'form-control', 'id'=>'product_name', 'required'=>'required'] ) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col col-lg-4">
                <label for="product_up" class="req">Unit Price (C$)</label>
                {{ Form::text('unit_price', NULL, ['class'=>'form-control', 'id'=>'product_up', 'data-parsley-required'=>"true", 'required'=>'required']) }}
                <!-- <input type="text" name="unit_price" id="product_up" class="form-control" data-parsley-required="true"> -->
            </div>
            <!--<div class="col col-lg-4">
            <label for="product_name" class="req">Sale Price</label>
            <input type="text" id="product_name" class="form-control" data-parsley-required="true">
            </div> -->
            <!--<div class="col col-lg-4">
            <label for="product_name" class="req">Sale Price</label>
            <input type="text" id="product_name" class="form-control" data-parsley-required="true">
            </div> -->
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col col-lg-4">
                <label for="product_length" class="req">Length  (Mts)</label>
                {{ Form::text('length', NULL, ['class'=>'form-control', 'id'=>'product_length']) }}
            </div>
            <div class="col col-lg-4">
                <label for="product_weight" class="req">Weight  (Lbs)</label>
                {{ Form::text('weight', NULL, ['class'=>'form-control', 'id'=>'product_weight']) }}
            </div>
            <!-- <div class="col col-lg-4">
            <label for="product_name" class="req">Sale Price</label>
            <input type="text" id="product_name" class="form-control" data-parsley-required="true">
            </div> -->
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-lg-4">
                <label for="product_category" class="req">Category</label>
                {{ Form::select('category_id',
                                ['-1'=>'Choose a category...'] + array_match($categories, 'id', 'name'),
                                NULL, ['class' => 'input required form-control', 'id' => 'product_category', 'required'=>'required']) }}
            </div>
            <div class="col-lg-4">
                <label for="product_provider" class="req">Provider</label>
                {{ Form::select('provider_id', ['-1'=>'Choose its provider..'] + array_match($providers, 'id', 'name'),
                                NULL, ['class'=>'required form-control', 'id'=>'product_provider',
                                        'required'=>'required', 'data-parsley-trigger'=>'change']) }}
            </div>
            <div class="col-lg-4">
                <label for="product_available" class="checkbox checkbox-inline">
                    {{ Form::checkbox('available', 1, '', ['id'=>'product_available']) }}
                    <b>Available</b>
                </label>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-5">
    <div class="row">
        <div class="form-group">
            <label for="product_description">Description</label>
            {{ Form::textarea('description', NULL,
                ['class'=> 'form-control', 'id'=>'product_description', 'size'=>'30x4']) }}
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <label for="product_notes">Notes</label>
            {{ Form::textarea('notes', NULL, ['class'=>'form-control', 'id'=>'product_notes', 'size'=>'30x4' ]) }}
        </div>
    </div>
</div>
<div class="row pull-right">
    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save</button>
    <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
</div>