<?php

namespace Vulehoangson\Ecommerce\Providers;

use Illuminate\Routing\Router;
use Illuminate\Support\ServiceProvider;
use Vulehoangson\Ecommerce\Console\Commands\MakeInvoiceCommand;
use Vulehoangson\Ecommerce\Http\Middlewares\Ecommerce;

class EcommerceServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

    }

    protected function addMiddlewares(): void
    {
        $router = $this->app->make(Router::class);

        $router->aliasMiddleware('ecommerce', Ecommerce::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Web routes
         */
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'ecommerce');

        $this->loadMigrationsFrom(__DIR__ . '/../../src/Database/Migrations');

        $this->publishes([
            __DIR__ . '/../../resources/assets' => public_path('ecommerce'),
        ], 'assets');

        $this->publishes([
            __DIR__ . '/../../config/ecommerce.php' => config_path('ecommerce.php')
        ], 'config');

        $this->commands([
            MakeInvoiceCommand::class,
        ]);

        $this->addMiddlewares();
    }
}
