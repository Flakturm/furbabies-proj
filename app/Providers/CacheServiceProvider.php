<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Area;
use Cache;

class CacheServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Cache::rememberForever('areas_drop', function() {
            return Area::all()->pluck('name', 'id');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
