app.controller("DashboardCtrl", function ($scope, $modal, $filter, ServersApi) {


    var refreshData = function () {
        $scope.myPromise = ServersApi.get(function (data) {
            $scope.servers = data.data;
            $scope.showTableContent = true;
        });
    };
    refreshData();

    $scope.$watch('servers', function (newValue, oldValue) {
        angular.forEach($scope.servers, function (server) {
            ServersApi.online({id: server.id}, function (data) {
                server.online = data.data;
            });

        });

    });


});