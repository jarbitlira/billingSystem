@section('page-top')
    <div class="col-xs-10">
        <h1 class="page-title"><span class="text-muted">Profile:</span> {{ $user->username }}</h1>
        <p><span class="text-muted">Role:</span> SuperAdmin</p>
    </div>
@endsection

@section('pre-panel')
<div class="col-xs-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="user_stat_item color_g">
                <i class="ion-images"></i>
                <span>147</span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="user_stat_item color_d">
                <i class="ion-chatbubble-working"></i>
                <span>53</span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="user_stat_item color_b">
                <i class="ion-android-social"></i>
                <span>419</span>
            </div>
        </div>
    </div>
</div>
<div class="col-xs-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <div class="user_stat_item color_f">
                <i class="ion-ios7-email-outline"></i>
                <span>68</span>
            </div>
        </div>
    </div>
</div>
@endsection

{{--{{ dd($user) }}--}}
<div class="user_profile">
    {{ Form::model($user, ['method'=>'PUT', 'action'=>'UsersController@profile', 'class'=>'form-horizontal']) }}
        <div class="tabbable tabs-right">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" href="#profile_general_pane" class="tab-default">General Info</a></li>
                <li><a data-toggle="tab" href="#profile_contact_pane" class="tab-default">Contact Info</a></li>
                <li><a data-toggle="tab" href="#profile_other_pane" class="tab-default">Other Info</a></li>
            </ul>
            <div class="tab-content">
                <div id="profile_general_pane" class="tab-pane active">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="profile_username" class="col-xs-2 control-label">Username</label>
                            <div class="col-xs-8">
                                {{Form::text('username', null, ['class'=>'form-control', 'id'=>'profile_username'])}}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="profile_email" class="col-xs-2 control-label">Email</label>
                            <div class="col-xs-8">
                                {{ Form::email('email', null, ['class'=>'form-control', 'id'=>'profile_email']) }}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label for="profile_fname" class="col-xs-3 control-label">First Name</label>
                            <div class="col-xs-8">
                                {{ Form::text('first_name', null, ['class'=>'form-control', 'id'=>'profile_fname']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="profile_lname" class="col-xs-3 control-label">Last Name</label>
                            <div class="col-xs-8">
                                {{ Form::text('last_name', null, ['class'=>'form-control', 'id'=>'profile_lname']) }}
                            </div>
                        </div>
                    </div>
                    <div class="row text-center">
                        <div class="form-group">
                            <label class="col-xs-4 control-label" for="profile_password">Password</label>
                            <div class="col-xs-5">
                                {{ Form::password('password', ['class'=>'form-control', 'id'=>'profile_password']) }}
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-xs-4 control-label req" for="profile_repassword">Re-type password</label>
                            <div class="col-xs-5">
                                {{ Form::password('password_confirmation', ['class'=>'form-control', 'id'=>'profile_repassword', 'required']) }}
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                        <label for="profile_password" class="col-xs-2 control-label">Password</label>
                        <div class="col-xs-10">
{{--                            {{ Form::password('password', ['class'=>'form-control', 'id'=>'profile_password']) }}--}}
                        </div>
                    </div> -->
                </div>
                <div id="profile_contact_pane" class="tab-pane">
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="heading_b">Address</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile_city" class="col-xs-2 control-label">City</label>
                        <div class="col-xs-10">
                            <input type="text" id="profile_city" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile_country" class="col-xs-2 control-label">Country</label>
                        <div class="col-xs-10">
                            <input type="text" id="profile_country" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile_street" class="col-xs-2 control-label">Street</label>
                        <div class="col-xs-10">
                            <input type="text" id="profile_street" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12">
                            <div class="heading_b">Social</div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile_email" class="col-xs-2 control-label">Email</label>
                        <div class="col-xs-10">
                            <input type="text" id="profile_email" class="form-control" value="laisha32@hotmail.com">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="profile_skype" class="col-xs-2 control-label">Skype</label>
                        <div class="col-xs-10">
                            <input type="text" id="profile_skype" class="form-control" value="royal_ritchie">
                        </div>
                    </div>
                </div>
                <div id="profile_other_pane" class="tab-pane">
                    <div class="form-group">
                        <label for="user_languages" class="col-xs-2 control-label">Signature</label>
                        <div class="col-xs-10">
                            <textarea id="user_signature" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_languages" class="col-xs-2 control-label">Languages</label>
                        <div class="col-xs-10">
                            <input type="text" id="user_languages" class="form-control" value="English,French">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="user_languages" class="col-xs-2 control-label">Newsletter</label>
                        <div class="col-xs-10">
                            <input type="checkbox" class="bs_switch" data-on-color="success" data-on-text="Yes" data-off-text="No">
                        </div>
                    </div>
                </div>
            </div>
            <hr>
            <div class="text-center">
                <button class="btn btn-success"><i class="fa fa-save"></i> Save profile</button>
                <a href="{{ URL::previous() }}" class="btn btn-default"> Cancel</a>
            </div>
        </div>
    {{ Form::close() }}
</div>