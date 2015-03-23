var app = angular.module('mcUAP', [
    'ngResource',
    'ui.bootstrap',
    'ui.router.tabs',
    'ui.router'
    ])


    .config(function ($interpolateProvider) {
        $interpolateProvider.startSymbol('[[');
        $interpolateProvider.endSymbol(']]');
    });