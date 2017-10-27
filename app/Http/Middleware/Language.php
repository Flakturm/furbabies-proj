<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ( Session::has( 'locale' ) AND array_key_exists( Session::get( 'locale' ), Config::get( 'languages' ) ) )
        {
            App::setLocale( Session::get('locale') );
            Carbon::setLocale( Session::get('locale') );
        }
        else
        { // This is optional as Laravel will automatically set the fallback language if there is none specified
            App::setLocale( Config::get('app.locale') );
            Carbon::setLocale( Config::get('app.locale') );
        }

        return $next($request);
    }
}
