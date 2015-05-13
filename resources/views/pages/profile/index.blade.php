@extends('app')

@section('content')
    <div class="container" data-ng-controller="ProfileCtrl">
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

                </div>
            </div>
        </div>
@endsection
