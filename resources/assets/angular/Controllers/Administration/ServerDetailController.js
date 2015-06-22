app.controller("ServerDetailCtrl", function($scope, $state, $stateParams, $filter, ServersApi) {

    $scope.myPromise =  ServersApi.get({id:$stateParams.id}, function(data) {
        $scope.resource = data.data;

        ServersApi.online({id: $scope.resource.id}, function (data) {
            $scope.resource.online = data.data;
        });
    });


    $scope.destroy = function () {
        ServersApi.destroy({id: $scope.resource.id}, function (data) {
        });

    };

    $scope.whitelist = function () {
        ServersApi.updateWhitelist({id: $scope.resource.id}, function (data) {
        });

    };



});