<?php
namespace Jurrid\Documentor;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class DocumentorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'docu');

        Route::group(['namespace'  => 'Jurrid\Documentor',], function () {
            $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        });

        if ($this->app->runningInConsole()) {
            $this->commands([
                GenerateDocumentation::class,
            ]);
        }
    }
    /**
     * Register the API doc commands.
     *
     * @return void
     */
    public function register()
    {
        // Config
        $this->mergeConfigFrom(
            __DIR__ . '/../config/documentor.php', 'documentor'
        );

        // Publish assets
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/documentor.php' => config_path('documentor.php'),
            ], 'documentor-config');

            $this->publishes([
                __DIR__ . '/../resources/publish/app.js' => public_path('vendor/documentor/app.js'),
                __DIR__ . '/../resources/publish/app.css' => public_path('vendor/documentor/app.css'),
                __DIR__ . '/../resources/images/favicon.ico' => public_path('vendor/documentor/favicon.ico'),
            ], 'documentor-assets');
        }
    }
}