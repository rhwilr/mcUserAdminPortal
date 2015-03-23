@extends('app')

@section('content')
    <div class="container">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <ul class="nav nav-pills nav-stacked">
                            <li class="active"><a href="#servers" data-toggle="tab" aria-expanded="true">Servers</a></li>
                            <li class="divider"></li>
                            <li class=""><a href="#subscriptions" data-toggle="tab" aria-expanded="false">Subscriptions</a></li>
                            <li class="divider"></li>
                            <li class=""><a href="#users" data-toggle="tab" aria-expanded="false">Users</a></li>
                            <li class=""><a href="#roles" data-toggle="tab" aria-expanded="false">Roles</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade active in" id="servers">
                        <div class="panel panel-default">
                            <div class="panel-heading">Servers</div>
                            <div class="panel-body">

                                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">
                                    Add Server
                                </button>

                                <table class="table table-striped table-hover ">
                                    <thead>
                                    <tr>
                                        <th>Server</th>
                                        <th>Status</th>
                                        <th width="120px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>bevo.rhwilr.ch</td>
                                        <td><p class="text-success">Online</p></td>
                                        <td>
                                            <div>
                                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
                                            </div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>


                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="true" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    {!! Form::open(['url' => ['/'], 'class'=>'form-horizontal']) !!}
                                    <fieldset>

                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">Add new Server</h4>
                                        </div>
                                        <div class="modal-body">

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <legend>Server</legend>
                                                    <div class="form-group">
                                                        {!!Form::label('servername', 'Server Name', ['class' => 'col-lg-2 control-label'])!!}
                                                        <div class="col-lg-10">
                                                            {!!Form::text('servername',null,['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        {!!Form::label('host', 'Hostname / IP', ['class' => 'col-lg-2 control-label'])!!}
                                                        <div class="col-lg-10">
                                                            {!!Form::text('host',null,['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="panel panel-default">
                                                <div class="panel-body">
                                                    <legend>Rcon</legend>
                                                    <div class="form-group">
                                                        {!!Form::label('rcon_port', 'Port', ['class' => 'col-lg-2 control-label'])!!}
                                                        <div class="col-lg-10">
                                                            {!!Form::text('rcon_port',null,['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        {!!Form::label('rcon_password', 'Password', ['class' => 'col-lg-2 control-label'])!!}
                                                        <div class="col-lg-10">
                                                            {!!Form::password('rcon_password',['class' => 'form-control'])!!}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            {!!Form::submit('Save',['class' => 'btn btn-primary'])!!}
                                        </div>

                                    </fieldset>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>


                    </div>

                    <div class="tab-pane fade" id="subscriptions">
                        <div class="panel panel-default">
                            <div class="panel-heading">Subscriptions</div>
                            <div class="panel-body">

                            </div>
                        </div>
                    </div>


                    <div class="tab-pane fade" id="users">
                        <div class="panel panel-default">
                            <div class="panel-heading">Users</div>
                            <div class="panel-body">

                                <table class="table table-striped table-hover ">
                                    <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>E-Mail</th>
                                        <th width="120px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <div>
                                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                                <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="roles">
                        <div class="panel panel-default">
                            <div class="panel-heading">Roles</div>
                            <div class="panel-body">

                                <table class="table table-striped table-hover ">
                                    <thead>
                                    <tr>
                                        <th>Role</th>
                                        <th>Description</th>
                                        <th>Members</th>
                                        <th width="120px"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($roles as $role)
                                        <tr>
                                            <td>{{$role->display_name}}</td>
                                            <td>{{$role->description}}</td>
                                            <td>{{$role-> users()->count()}}</td>

                                            <td>
                                                <div>
                                                    <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-edit" aria-hidden="true"></span></a>
                                                    <a href="#" class="btn btn-default"><span class="glyphicon glyphicon-arrow-right" aria-hidden="true"></span></a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
