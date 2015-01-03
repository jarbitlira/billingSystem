<div class="col-xs-6">
    <div class="form-group">
        <label for="">Name</label>
        {{ Form::text('name', null, ['class'=>'form-control', 'id'=>'client_name', 'required']) }}
    </div>
    <div class="form-group">
        {{ Form::label('client_address', 'Address') }}
        {{ Form::textarea('address', null, ['class'=>'form-control', 'id'=>'client_address', 'size'=>'20x5']) }}
    </div>
</div>
<div class="col-xs-6">
    <div class="form-group">
        <label for="client_email">Email</label>
        {{ Form::text('email', null, ['class'=>'form-control', 'id'=>'client_email']) }}
    </div>
    <div class="form-group">
        <label for="client_phone1">Phone Contact</label>
        {{ Form::text('phone1', null, ['class'=>'form-control', 'id'=>'client_phone1']) }}
    </div>
    <div class="form-group">
        <label for="client_phone2">Phone Number</label>
        {{ Form::text('phone2', null, ['class'=>'form-control', 'id'=>'client_phone2']) }}
    </div>
    <div class="row text-right">
        <button class="btn btn-lg btn-success" type="submit"><i class="fa fa-save"></i>Save</button>
        <a class="btn btn-default" href="{{URL::previous()}}">Cancel</a>
    </div>
</div>