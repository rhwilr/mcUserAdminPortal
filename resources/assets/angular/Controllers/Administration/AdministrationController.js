app.controller("AdminCtrl", function($scope) {

    $scope.tabData   = [
        {
            heading: 'Servers',
            route:   'servers'
        },
        {
            heading: 'Patrons',
            route: 'patrons'
        },
        {
            heading: 'Users',
            route:   'users'
        }
    ];


}).config(function($stateProvider, $urlRouterProvider) {
    //
    // Now set up the states
    $stateProvider.state('servers', {
        url: '/servers',
        templateUrl: '/partials/admin/servers.html',
        controller: 'ServerIndexCtrl'
    })
        .state('servers.detail', {
            url: "^/servers/:id",
            views: {
                '@': {
                    templateUrl: '/partials/admin/servers.detail.html',
                    controller: 'ServerDetailCtrl'
                }
            }})
        .state('patrons', {
            url: '/patrons',
            templateUrl: '/partials/admin/patrons.html',
            controller: 'PatronIndexCtrl'
    })
        .state('users', {
        url: '/users',
            templateUrl: '/partials/admin/users.html',
            controller: 'UserIndexCtrl'
    });

});