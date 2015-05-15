app.controller("RulesCtrl", function ($scope, $modal, $filter, RulesApi) {


    var refreshData = function () {
        $scope.myPromise = RulesApi.get(function (data) {
            $scope.user = data.data;
        });
    };
    refreshData();

    $scope.$watch('user', function (newValue, oldValue) {
        angular.forEach($scope.servers, function (server) {
            ServersApi.online({id: server.id}, function (data) {
                server.online = data.data;
            });

        });

    });


});