<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::group(['prefix' => 'api/v1'], function()
{
    Route::resource('server', '\rhwilr\mcUserAdminPortal\Api\v1\Controllers\ServerController',['except' => ['create', 'edit']]);
    Route::resource('server.online', '\rhwilr\mcUserAdminPortal\Api\v1\Controllers\ServerOnlineController',['only' => ['index']]);
    Route::resource('server.updateWhitelist', '\rhwilr\mcUserAdminPortal\Api\v1\Controllers\ServerWhitelistController',['only' => ['index']]);

    Route::match(['get', 'put', 'patch'],'user/me/{method?}', '\rhwilr\mcUserAdminPortal\Api\v1\Controllers\UserController@me');
    Route::match(['put', 'patch'],'user/{id}/profile', '\rhwilr\mcUserAdminPortal\Api\v1\Controllers\UserController@updateProfile');
    Route::match(['put', 'patch'],'user/{id}/password', '\rhwilr\mcUserAdminPortal\Api\v1\Controllers\UserController@updatePassword');
    Route::match(['put', 'patch'],'user/{id}/minecraft', '\rhwilr\mcUserAdminPortal\Api\v1\Controllers\UserController@updateMinecraft');
    Route::match(['get'], 'user/patrons', '\rhwilr\mcUserAdminPortal\Api\v1\Controllers\UserController@patrons');
    Route::resource('user', '\rhwilr\mcUserAdminPortal\Api\v1\Controllers\UserController',['except' => ['create', 'edit', 'update']]);

    Route::controller('rules', '\rhwilr\mcUserAdminPortal\Api\v1\Controllers\RulesController');
});