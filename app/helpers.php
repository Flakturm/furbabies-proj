<?php

/**
 * Global helpers file with misc functions.
 */
if (! function_exists('app_name') )
{
    /**
     * Helper to grab the application name.
     *
     * @return mixed
     */
    function app_name()
    {
        return env('APP_NAME');
    }
}

if (! function_exists('isActiveRoute') )
{
    /*
    |--------------------------------------------------------------------------
    | Detect Active Route
    |--------------------------------------------------------------------------
    |
    | Compare given route with current route and return output if they match.
    | Very useful for navigation, marking if the link is active.
    |
    */
    function isActiveRoute( $route, $output = 'active' )
    {
        if ( Route::currentRouteName() == $route ) return $output;
    }
}
