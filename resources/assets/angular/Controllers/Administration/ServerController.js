app.controller("ServerIndexCtrl", function($scope, $modal, ServersApi) {
    ServersApi.query(function(data) {
        console.log(data.data);
        $scope.servers = data.data;
    });


    $scope.data = {"servername": "testing..."};

    $scope.open = function () {

        console.log($scope.data);
        var modalInstance = $modal.open({
            templateUrl: 'AddServerModal.html',
            controller: 'ModalInstanceCtrl',
            resolve: {
                data: function () {
                    return $scope.data;
                }
            }
        });

        modalInstance.result.then(function (data) {
            console.log(data);
        }, function () {
            console.log('Modal dismissed at: ' + new Date());
        });
    };

});