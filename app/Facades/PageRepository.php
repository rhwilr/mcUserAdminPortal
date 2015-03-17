<?php

namespace rhwilr\mcUserAdminPortal\Facades;

use Illuminate\Support\Facades\Facade;

class PageRepository extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'pagerepository';
    }
}