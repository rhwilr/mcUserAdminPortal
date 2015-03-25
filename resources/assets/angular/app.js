var app = angular.module('mcUAP', [
    'ngResource',
    'ui.bootstrap',
    'ui.router.tabs',
    'ui.router',
    'cgBusy'
    ])


    .config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    })
    .value('cgBusyDefaults',{
        message:'Loading Data',
        backdrop: false,
        templateUrl: '/partials/common/angular-busy.html',
        delay: 0,
        minDuration: 100,
        wrapperClass: 'my-class my-class2'
    });