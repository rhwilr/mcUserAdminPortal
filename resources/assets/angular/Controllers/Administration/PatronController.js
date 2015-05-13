app.controller("PatronIndexCtrl", function ($scope, $modal, $filter, UserApi) {

    var refreshData = function () {
        $scope.myPromise = UserApi.patrons(function (data) {
            $scope.resource = data.data;
            $scope.showTableContent = true;
        });
    };
    refreshData();

});