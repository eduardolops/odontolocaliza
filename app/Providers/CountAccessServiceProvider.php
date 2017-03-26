<?php

namespace Doctor\Providers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;

class CountAccessServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        App::bind('countaccess', function()
        {
            return new \Doctor\Helpers\CountAccess;
        });
    }
}
