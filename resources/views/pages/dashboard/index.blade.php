@extends('app')

@section('content')
<div class="container">
    <div class="row" data-ng-controller="DashboardCtrl">

        <div class="col-md-12">
            <div class="jumbotron">
            	<h1>NEW: ARK: Survival Evolved<small>rhwilr.ch</small></h1>
                <h3>Season 2: FTB Infinity <small>Version: 1.9.0</small></h3>
                <p>Join the <a href="{{ url('info/mumble/info') }}">Mumble-Server</a> for voice chat!</p>
            </div>
        </div>

        <div class="col-md-8">
            <div class="panel panel-default">
                <div class="panel-heading">Servers</div>
                <div class="panel-body">

                    <table class="table table-striped table-hover ">
                        <thead>
                        <tr>
                            <th>Server</th>
                            <th>Host</th>
                            <th>Status</th>
                            <th>Players</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr ng-repeat="server in servers">
                            <td class="vert-align">[[server.name]]</td>
                            <td class="vert-align">[[server.host]]</td>
                            <td class="vert-align">
                                <span class="spinner" ng-hide="server.online"><i
                                            class="glyphicon glyphicon-refresh glyphicon-spin"></i></span>

                                <p class="text-success" ng-if="server.online.online">Online</p>

                                <p class="text-danger" ng-hide="!server.online" ng-if="!server.online.online">
                                    Offline</p>
                            </td>
                            <td class="vert-align">
                                <span class="spinner" ng-hide="server.online"><i
                                            class="glyphicon glyphicon-refresh glyphicon-spin"></i></span>

                                <p ng-if="server.online">[[server.online.player_online]] /
                                    [[server.online.player_max]]</p>
                            </td>
                        </tr>
                        <tr ng-hide="servers.length || !showTableContent">
                            <td colspan="3">No Server available!</td>
                        </tr>
                        </tbody>
                    </table>
                    <div cg-busy="myPromise"></div>
                    <div class="alert alert-dismissible alert-info">
                        Add your Minecraft-Username in your <a href="/profile#/minecraft" class="alert-link">Profile</a> to get whitelisted.
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="panel panel-default">
                <div class="panel-heading">Mumble</div>
                <div class="panel-body">
                    <p><a href="{{ url('info/mumble/info') }}">Mumble Voice Chat:</a></p>

                    <p><b>mumble.rhwilr.ch</b></p>
                </div>
            </div>
        </div>

        <div class="col-md-12">

            <div class="panel panel-default">
                <div class="panel-heading">Info / Known Bugs</div>
                <div class="panel-body">
                    <p>There are absolutely no bugs.... ;)</p>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading">Map
                    <a href="http://map.rhwilr.ch/" target="_blank" class="pull-right">
                    <span class="glyphicon glyphicon-resize-full" aria-hidden="true">

                    </span></a></div>

                <div class="panel-body">
                    <iframe src="http://map.rhwilr.ch/" height="800" width="100%" name="map.rhwilr.ch"><a
                                href="http://map.rhwilr.ch/">http://map.rhwilr.ch/</a></iframe>

                </div>
            </div>
		</div>
	</div>
</div>
@endsection
