<div class="col-xs-12">
    <div class="form-group">
        <label for="first_name">Role Name</label>
        {{ Form::text('name', null, ['class'=>'form-control', 'id'=>'first_name', 'required']) }}
    </div>

    <div class="row pull-right">
        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save</button>
        <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
    </div>
</div>
