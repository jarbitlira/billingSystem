<div class="col-xs-6">
    <div class="form-group">
        <label for="first_name">First Name</label>
        {{ Form::text('first_name', null, ['class'=>'form-control', 'id'=>'first_name', 'required']) }}
    </div>
    <div class="form-group">
        <label for="last_name">Last Name</label>
        {{ Form::text('last_name', null, ['class'=>'form-control', 'id'=>'last_name', 'required']) }}
    </div>
    <div class="form-group">
        <label for="user_email">Email</label>
        {{ Form::email('email', null, ['class'=>'form-control', 'id'=>'user_email', 'required']) }}
    </div>

</div>
<div class="col-xs-6">
    <div class="form-group">
        <label for="user_email">Nickname</label>
        {{ Form::text('username', null, ['class'=>'form-control', 'id'=>'user_email', 'required']) }}
    </div>
    <div class="form-group">
        <label for="user_password">Password</label>
        {{ Form::password('password', ['class'=>'form-control', 'id'=>'user_password', 'required']) }}
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password Confirmation</label>
        {{ Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'password_confirmation', 'required']) }}
    </div>
    <div class="row pull-right">
        <button type="submit" class="btn btn-lg btn-success"><i class="fa fa-save"></i> Save</button>
        <a href="{{ URL::previous() }}" class="btn btn-default">Cancel</a>
    </div>
</div>
