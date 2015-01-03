<div class="row">
    <div class="col-xs-offset-3 col-xs-7">
        <div class="form-group">
            <label for="category_name">Name</label>
            {{ Form::text('name', null, ['class'=>'form-control', 'id'=>'category_name']) }}
        </div>
    </div>
    <div class="col-xs-12">
        <div class="pull-right">
            <button class="btn btn-lg btn-success"><i class="fa fa-save"></i>Save</button>
            <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
        </div>
    </div>
</div>
