app.controller("ServerIndexCtrl", function($scope, $modal, $filter, ServersApi) {

    var refreshData = function () {
        $scope.myPromise = ServersApi.get(function(data) {
            $scope.servers = data.data;
            $scope.showTableContent = true;
        });
    };
    refreshData();

    $scope.$watch('servers', function(newValue, oldValue) {
        angular.forEach($scope.servers, function(server){
            ServersApi.online({id:server.id},function(data) {
                server.online = data.data;
            });

        });

    });

    $scope.open = function (serverEditID) {
        var modalInstance = $modal.open({
            templateUrl: 'AddServerModal.html',
            controller: 'ModalInstanceCtrl',
            resolve: {
                ResourcesApi: function () {
                    return  ServersApi;
                },
                recordID: function () {
                    return  serverEditID;
                }
            }
        });

        modalInstance.result.then(function (data) {
            refreshData();
        }, function () {
        });
    };

});