<?php

/**
 * Global helpers file with misc functions.
 */
if (! function_exists('app_name'))
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

if (! function_exists('is_404'))
{
    /**
     * Helper to check if the url is broken or not.
     *
     * @return boolean
     */
    function is_404( $url )
    {
        if ( empty( $url ) )
        {
            return true;
        }

        $headers = get_headers( $url );

        return strpos( $headers[0], '404' ) ? true : false;
    }
}
