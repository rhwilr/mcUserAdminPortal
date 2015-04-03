app.controller('ModalInstanceCtrl', function ($scope, $modalInstance, ResourcesApi, recordID) {

    if (recordID) {
        $scope.myPromise =  ResourcesApi.get({id:recordID}, function(data) {
            $scope.resource = data.data;
            $scope.showModalContent = true;
        });
    }
    else {
        $scope.showModalContent = true;
    }

    $scope.ok = function () {
        if(recordID){
            ResourcesApi.update({ id:$scope.resource.id }, $scope.resource, function(res) {
                $modalInstance.close($scope.resource);
            }, function(res) {
                $scope.errorResponse = res.data.error.message;
            });
        } else {
            console.log("2");
            ResourcesApi.save( $scope.resource, function(res) {
                $modalInstance.close($scope.resource);
            }, function(res) {
                $scope.errorResponse = res.data.error.message;
            });
        }

    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
});