<?php

namespace Modules\Pages\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;

class PageServiceProvider extends ServiceProvider
{
    public function boot()
    {
        /**
         * configura carregamento automatico de rotas no inicio da aplicação
         */
        Route::namespace('Modules\Pages\Http\Controllers')
            ->middleware(['web'])
            ->group(__DIR__ . '/../Routes/web.php');

        /**
         * configura carregamento automatico de views no inicio da aplicação
         */
        $this->loadViewsFrom(__DIR__ . '/../Views', 'Page');

        /**
         * configura carregamento automatico de migrations no inicio da aplicação
         */
        $this->loadMigrationsFrom(__DIR__ . '/../Migrations');

        /**
         * configura carregamento automatico de traduções no inicio da aplicação
         */
        $this->loadTranslationsFrom(__DIR__ . '/../Lang', 'Page');


        $this->publishes([
            __DIR__ . '/../Views' => resource_path('views/vendor/Page'),
        ], 'views');

        $this->publishes([
            __DIR__ . '/../Lang' => resource_path('lang/vendor/Page'),
        ], 'lang');

        $this->publishes([
            __DIR__.'/../config/pages.php' => config_path('pages.php'),
        ], 'config');

        $this->publishes([
            __DIR__.'/../public/assets/style.css' => public_path('vendor/style.css'),
        ], 'public');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/pages.php',
            'pages'
        );
    }
}