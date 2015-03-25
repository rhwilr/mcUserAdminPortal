app.controller("ServerIndexCtrl", function($scope, $modal, $filter, ServersApi) {
    $scope.myPromise = ServersApi.get(function(data) {
        $scope.servers = data.data;
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
            if(data.editMode){
                ServersApi.update({ id:data.id }  , data);
            } else {
                ServersApi.save( data);
                $scope.servers.push(data);
            }
        }, function () {

        });
    };

});