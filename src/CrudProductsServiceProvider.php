<?php

namespace Kriegsmarine\crudproducts;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Blade;

class CrudProductsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $this->loadMigrationsFrom(__DIR__.'/migrations');
        $this->publishes([
            __DIR__.'/migrations/' => database_path('migrations')
        ], 'migrations');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
        include __DIR__.'/routes.php';
        $this->app->make('Kriegsmarine\crudproducts\controllers\CrudProductsController');
        $this->app->make('Kriegsmarine\crudproducts\models\Products');
        $this->loadViewsFrom(__DIR__.'/views/', 'crudproducts');

    }
}
