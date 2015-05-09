app.controller("UserIndexCtrl", function ($scope, $modal, $filter, UserApi) {

    var refreshData = function () {
        $scope.myPromise = UserApi.get(function (data) {
            $scope.resource = data.data;
            $scope.showTableContent = true;
        });
    };
    refreshData();

    $scope.open = function (UserEditID) {
        var modalInstance = $modal.open({
            templateUrl: 'AddUserModal.html',
            controller: 'ModalInstanceCtrl',
            resolve: {
                ResourcesApi: function () {
                    return UserApi;
                },
                recordID: function () {
                    return UserEditID;
                }
            }
        });

        modalInstance.result.then(function (data) {
            refreshData();
        }, function () {
        });
    };

});