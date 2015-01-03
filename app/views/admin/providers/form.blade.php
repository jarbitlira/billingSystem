<div class="col-xs-6">
    <div class="form-group">
        <label for="provider_name">Name</label>
        {{ Form::text('name', null, ['class'=>'form-control', 'id'=>'provider_name', 'required']) }}
    </div>
    <div class="form-group">
        <label for="provider_email">Email</label>
        {{ Form::email('email', null, ['class'=>'form-control', 'id'=>'provider_email', 'required']) }}
    </div>
    <div class="form-group">
        <label for="provider_phone1">Phone contact</label>
        {{ Form::text('phone1', null, ['class'=>'form-control', 'id'=>'provider_phone1', 'pattern'=>'\d+', 'required']) }}
    </div>
    <div class="form-group">
        <label for="provider_phone2">Phone Number</label>
        {{ Form::text('phone2', null, ['class'=>'form-control', 'id'=>'provider_phone2', 'pattern'=>'\d+']) }}
    </div>
</div>
<div class="col-xs-6">
    <div class="form-group">
        <label for="provider_address">Address</label>
        {{ Form::textarea('address', null, ['class'=>'form-control', 'id'=>'provider_address', 'size'=>'20x4']) }}
    </div>
    <div class="form-group">
        <label for="provider_description">Description</label>
        {{ Form::textarea('description', null, ['class'=>'form-control', 'id'=>'provider_description', 'size'=>'20x4']) }}
    </div>
    <div class="row pull-right">
        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save</button>
        <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
    </div>
</div>
