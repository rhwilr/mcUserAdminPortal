app.controller("AdminCtrl", function($scope) {

    $scope.tabData   = [
        {
            heading: 'Servers',
            route:   'servers'
        },
        {
            heading: 'Subscriptions',
            route:   'subscriptions'
        },
        {
            heading: 'Users',
            route:   'users'
        },
        {
            heading: 'Roles',
            route:   'roles'
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
        .state('subscriptions', {
        url: '/subscriptions',
        templateUrl: '/partials/admin/subscriptions.html'
    })
        .state('users', {
        url: '/users',
        templateUrl: '/partials/admin/users.html'
    })
        .state('roles', {
        url: '/roles',
        templateUrl: '/partials/admin/roles.html'
    });

});