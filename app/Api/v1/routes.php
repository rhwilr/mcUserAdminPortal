<?php

use rhwilr\mcUserAdminPortal\Models\User;
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
});