app.controller("ServerIndexCtrl", function($scope, $modal, $filter, ServersApi) {
    ServersApi.get(function(data) {
        $scope.servers = data.data;
    });

    $scope.open = function (serverEditID) {

        $scope.EditObject = {};
        if(serverEditID){
            $scope.EditObject = $filter('filter')($scope.servers, function (d) {return d.id === serverEditID;})[0];
            $scope.EditObject.editMode=true;
        }



        var modalInstance = $modal.open({
            templateUrl: 'AddServerModal.html',
            controller: 'ModalInstanceCtrl',
            resolve: {
                data: function () {
                    return  $scope.EditObject;
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