app.controller("MinecraftIndexCtrl", function($scope, $modal, $filter, UserApi) {

    var refreshData = function () {
        $scope.myPromise = UserApi.me(function(data) {
            $scope.resource = data.data;
            $scope.showTableContent = true;
        });
    };
    refreshData();

    $scope.saveMinecraft = function () {
        UserApi.meUpdateMinecraft($scope.resource, function(res) {
            $scope.successMinecraftResponse = res;
            $scope.errorResponse = null;
        }, function(res) {
            $scope.errorResponse = res.data.error.message;
        });
    };


});