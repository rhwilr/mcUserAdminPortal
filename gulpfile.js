var elixir = require('laravel-elixir');

require('laravel-elixir-angular');
/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Less
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function(mix) {
    mix.less('app.less')

        .scripts([
            'angular/angular.js',
            'angular-resource/angular-resource.js',
            'angular-bootstrap/ui-bootstrap.js',
            'angular-bootstrap/ui-bootstrap-tpls.js',
            'angular-ui-router/release/angular-ui-router.js',
            'angular-ui-router-tabs/src/ui-router-tabs.js'
        ], 'public/js/dependencies.min.js', 'bower_components/')

        .angular("resources/assets/angular/", "public/js/", "app.min.js")

        .copy('resources/partials', 'public/partials');
});