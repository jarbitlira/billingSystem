<div class="col-xs-8">
    <div class="row">
        <div class="form-group">
            <div class="col-xs-4">
                <label for="product_sku" class="req">SKU</label>
                {{ Form::text('sku', NULL, ['class'=> 'form-control', 'id'=>'product_sku', 'required'=>'required']) }}
            </div>
            <div class="col-xs-4">
                <label for="product_name" class="req">Name</label>
                {{ Form::text('name', NULL, ['class'=>'form-control', 'id'=>'product_name', 'required'=>'required'] ) }}
            </div>
            <div class="col-xs-4">
                <label for="product_brand" class="req">Brand</label>
                {{ Form::text('brand', NULL, ['class'=>'form-control', 'id'=>'product_brand', 'required'=>'required'] ) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-xs-3">
                <label for="unit_price" class="req">Unit Price (C$)</label>
                {{ Form::text('unit_price', NULL, ['class'=>'form-control', 'id'=>'unit_price',
                 'data-parsley-required'=>"true", 'required'=>'required', 'pattern'=>'\d*']) }}
            </div>
            <div class="col-xs-3">
                <label for="current_stock" class="req">Current Stock</label>
                {{ Form::number('current_stock', NULL, ['class'=>'required form-control', 'id'=>'current_stock',
                 'min'=>0, 'max'=>1000, 'required'=>'required', 'pattern'=>'\d*']) }}
            </div>
            <div class="col-xs-3">
                <label for="min_stock" class="req">Minimum Stock</label>
                {{ Form::number('min_stock', NULL, ['class'=>'required form-control', 'id'=>'min_stock',
                 'min'=>1, 'required'=>'required', 'pattern'=>'\d*']) }}
            </div>
            <div class="col-xs-3">
                <label for="max_stock" class="req">Maximum Stock</label>
                {{ Form::number('max_stock', NULL, ['class'=>'required form-control', 'id'=>'max_stock',
                 'min'=>1, 'required'=>'required', 'pattern'=>'\d*']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-xs-6">
                <label for="product_measure_id" class="req">Measure Type</label>
                {{ Form::select('measure_id', [''=>'Choose a measure...'] + array_match($measures, 'id', 'description'),
                NULL, ['class'=>'required form-control', 'id'=>'product_measure_id']) }}
            </div>
            <div class="col-xs-6">
                <label for="product_measure_size" class="req">Size</label>
                {{ Form::text('measure_size', NULL, ['class'=>'form-control', 'id'=>'product_measure_size']) }}
            </div>
        </div>
    </div>
    <div class="row">
        <div class="form-group">
            <div class="col-xs-4">
                <label for="product_category" class="req">Category</label>
                {{ Form::select('category_id',
                                [''=>'Choose a category...'] + array_match($categories, 'id', 'name'),
                                NULL, ['class' => 'input required form-control', 'id' => 'product_category', 'required'=>'required']) }}
            </div>
            <div class="col-xs-4">
                <label for="product_provider" class="req">Provider</label>
                {{ Form::select('provider_id', [''=>'Choose its provider..'] + array_match($providers, 'id', 'name'),
                                NULL, ['class'=>'required form-control', 'id'=>'product_provider',
                                        'required'=>'required', 'data-parsley-trigger'=>'change']) }}
            </div>
            <br/>

            <div class="col-xs-3">
                <label for="product_available" class="checkbox checkbox-inline">
                    {{ Form::checkbox('available', 1, '', ['id'=>'product_available']) }}
                    <b>Available</b>
                </label>
            </div>
        </div>
    </div>

</div>

<div class="col-xs-4">
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
<div class="row text-right">
    <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save</button>
    <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
</div>