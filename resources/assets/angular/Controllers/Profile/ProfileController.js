app.controller("ProfileCtrl", function($scope) {

    $scope.tabData   = [
        {
            heading: 'Profile',
            route:   'profile'
        },
        {
            heading: 'Minecraft',
            route:   'minecraft'
        }
    ];


}).config(function($stateProvider, $urlRouterProvider) {
    //
    // For any unmatched url, redirect to /state1
    $urlRouterProvider.otherwise("/profile");
    //
    // Now set up the states
    $stateProvider.state('profile', {
        url: '/profile',
        templateUrl: '/partials/profile/profile.html'
    }).state('minecraft', {
        url: '/minecraft',
        templateUrl: '/partials/profile/minecraft.html'
    });

});