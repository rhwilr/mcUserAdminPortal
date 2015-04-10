app.controller("ServerDetailCtrl", function($scope, $state, $stateParams, $filter, ServersApi) {

    $scope.myPromise =  ServersApi.get({id:$stateParams.id}, function(data) {
        $scope.resource = data.data;
    });


});