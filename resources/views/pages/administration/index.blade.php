@extends('app')

@section('content')
    <div class="container" data-ng-controller="AdminCtrl">
        <div class="row">

            <div class="col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <tabs data="tabData" type="pills" vertical="true"/>
                    </div>
                </div>
            </div>

            <div class="col-md-9">
                <div id="myTabContent" class="tab-content">

                    <ui-view></ui-view>


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
