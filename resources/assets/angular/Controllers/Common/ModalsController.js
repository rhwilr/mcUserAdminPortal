app.controller('ModalInstanceCtrl', function ($scope, $modalInstance, ResourcesApi, recordID) {


    $scope.myPromise =  ResourcesApi.get({id:recordID}, function(data) {
        $scope.resource = data.data;
    });

    $scope.ok = function () {
        $modalInstance.close($scope.resource);
    };

    $scope.cancel = function () {
        $modalInstance.dismiss('cancel');
    };
});