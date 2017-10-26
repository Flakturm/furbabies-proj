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

        $ch = curl_init($url);
        // don't download content
        curl_setopt($ch, CURLOPT_NOBODY, 1);
        curl_setopt($ch, CURLOPT_FAILONERROR, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        return curl_exec( $ch ) !== false;
    }
}
