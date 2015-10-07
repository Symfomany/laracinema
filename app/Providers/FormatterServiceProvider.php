<?php

namespace App\Providers;

use App\Api\Formatter;
use Illuminate\Support\ServiceProvider;

class FormatterServiceProvider extends ServiceProvider
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
        $this->app->singleton('formatter', function () {
            return new Formatter();
        });
    }

}
