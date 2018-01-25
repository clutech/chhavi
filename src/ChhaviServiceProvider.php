<?php

namespace Clutech\Chhavi;

use Illuminate\Support\ServiceProvider;

class ChhaviServiceProvider extends ServiceProvider
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
        $this->app->singleton(Chhavi::class, function () {
            return new Chhavi();
        });
        $this->app->alias(Chhavi::class, 'Chhavi');
    }
}
