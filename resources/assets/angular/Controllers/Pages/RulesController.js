app.controller("RulesCtrl", function ($scope, $modal, $filter, RulesApi) {


    var refreshData = function () {
        $scope.myPromise = RulesApi.get(function (data) {
            $scope.user = data.data;
        });
    };
    refreshData();


    $scope.changeRules = function() {

        if ($scope.user.rules_agreed){
            RulesApi.agree($scope.resource, function(res) {
            }, function(res) {
            });
        } else {
            RulesApi.disagree($scope.resource, function(res) {
            }, function(res) {
            });
        }

    };


});