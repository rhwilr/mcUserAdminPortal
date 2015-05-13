<?php namespace rhwilr\mcUserAdminPortal;

use HTML;
use Route;
use Request;

/**
 * Blade Macro to set the active class if site is in current url
 *
 * @param string $uri
 * @return string
 */
HTML::macro('set_active', function($uri)
{
    if (Route::currentRouteName()) {
        return Route::currentRouteName() == $uri ? 'active' : '';
    } else {
        return Request::path() == $uri ? 'active' : '';
    }
});
