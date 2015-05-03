app.controller("UserIndexCtrl", function ($scope, $modal, $filter, UserApi) {

    var refreshData = function () {
        $scope.myPromise = UserApi.get(function (data) {
            $scope.resource = data.data;
            $scope.showTableContent = true;
        });
    };
    refreshData();

});