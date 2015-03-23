@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#profile" data-toggle="tab" aria-expanded="true">Profile</a></li>
                            <li class=""><a href="#minecraft" data-toggle="tab" aria-expanded="false">Minecraft</a></li>
                            <li class=""><a href="#billing" data-toggle="tab" aria-expanded="false">Billing</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-md-9">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="profile">
                        <div class="panel panel-default">
                            <div class="panel-heading">Profile</div>
                            <div class="panel-body">
                                {!! Form::model($user, ['method' => 'put', 'route' => ['profile.update', $user->id], 'class'=>'form-horizontal']) !!}
                                <fieldset>

                                    <div class="form-group">
                                        {!!Form::label('name', 'Name', ['class' => 'col-lg-2 control-label'])!!}
                                        <div class="col-lg-10">
                                            {!!Form::text('name',null,['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!!Form::label('email', 'E-Mail Address', ['class' => 'col-lg-2 control-label'])!!}
                                        <div class="col-lg-10">
                                            {!!Form::text('email',null,['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            {!!Form::submit('Save',['class' => 'btn btn-primary'])!!}
                                        </div>
                                    </div>

                                </fieldset>
                                {!! Form::close() !!}
                            </div>
                        </div>

                        <div class="panel panel-default">
                            <div class="panel-heading">Password</div>
                            <div class="panel-body">
                                {!! Form::model($user, ['method' => 'get', 'url' => ['profile'], 'class'=>'form-horizontal']) !!}
                                <fieldset>

                                    <div class="form-group">
                                        {!!Form::label('currentpassword', 'Current password', ['class' => 'col-lg-2 control-label'])!!}
                                        <div class="col-lg-10">
                                            {!!Form::password('currentpassword',['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!!Form::label('newpassword', 'New password', ['class' => 'col-lg-2 control-label'])!!}
                                        <div class="col-lg-10">
                                            {!!Form::password('newpassword',['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        {!!Form::label('newpasswordrepeat', 'Confirm new password', ['class' => 'col-lg-2 control-label'])!!}
                                        <div class="col-lg-10">
                                            {!!Form::password('newpasswordrepeat',['class' => 'form-control'])!!}
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="col-lg-10 col-lg-offset-2">
                                            {!!Form::submit('Save',['class' => 'btn btn-primary'])!!}
                                        </div>
                                    </div>

                                </fieldset>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="minecraft">
                        <div class="panel panel-default">
                            <div class="panel-heading">Minecraft</div>
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="billing">
                        <div class="panel panel-default">
                            <div class="panel-heading">Billing</div>
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
