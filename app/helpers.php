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

if (! function_exists('makeJS') )
{
    function makeJS( $file )
    {
        if ( app()->environment('production') )
        {
            return Html::script( secure_asset( mix( $file ) ) );
        }
        else
        {
            return Html::script( asset( mix( $file ) ) );
        }
    }
}

if (! function_exists('makeCss') )
{
    function makeCss( $file )
    {
        if ( app()->environment('production') )
        {
            return Html::style( secure_asset( mix( $file ) ) );
        }
        else
        {
            return Html::style( asset( mix( $file ) ) );
        }
    }
}

if (! function_exists('makeImg') )
{
    function makeImg( $file, $alt = '', $class = [] )
    {
        if ( app()->environment('production') )
        {
            return Html::image( secure_asset($file), $alt, $class );
        }
        else
        {
            return Html::image( asset($file), $alt, $class );
        }
    }
}
