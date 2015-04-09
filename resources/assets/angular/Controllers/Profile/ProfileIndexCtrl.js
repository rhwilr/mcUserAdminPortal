app.controller("ProfileIndexCtrl", function($scope, $modal, $filter, UserApi) {

    var refreshData = function () {
        $scope.myPromise = UserApi.me(function(data) {
            $scope.resource = data.data;
            $scope.showTableContent = true;
        });
    };
    refreshData();

    $scope.saveProfile = function () {
        UserApi.meUpdateProfile($scope.resource, function(res) {
            $scope.successProfileResponse = res;
            $scope.errorResponse = null;
        }, function(res) {
            $scope.errorResponse = res.data.error.message;
        });
    };

    $scope.savePassword = function () {
        UserApi.meUpdatePassword($scope.resource, function(res) {
            $scope.successPasswordResponse = res;
            $scope.errorResponse = null;
        }, function(res) {
            $scope.errorResponse = res.data.error.message;
        });
    };


});