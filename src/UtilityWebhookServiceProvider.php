<?php

namespace Corals\Modules\Utility\Webhook;

use Corals\Modules\Utility\Webhook\Facades\Webhooks;
use Corals\Modules\Utility\Webhook\Providers\UtilityAuthServiceProvider;
use Corals\Modules\Utility\Webhook\Providers\UtilityRouteServiceProvider;
use Corals\Settings\Facades\Modules;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class UtilityWebhookServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadViewsFrom(__DIR__ . '/resources/views', 'utility-webhook');
        $this->loadTranslationsFrom(__DIR__ . '/resources/lang', 'utility-webhook');

        $this->mergeConfigFrom(
            __DIR__ . '/config/utility-webhook.php',
            'utility-webhook'
        );
        $this->publishes([
            __DIR__ . '/config/utility-webhook.php' => config_path('utility-webhook.php'),
            __DIR__ . '/resources/views' => resource_path('resources/views/vendor/utility-webhook'),
        ]);

        $this->registerModulesPackages();
    }

    public function register()
    {
        $this->app->register(UtilityAuthServiceProvider::class);
        $this->app->register(UtilityRouteServiceProvider::class);

        $this->app->booted(function () {
            $loader = AliasLoader::getInstance();
            $loader->alias('Webhooks', Webhooks::class);
        });
    }

    protected function registerModulesPackages()
    {
        Modules::addModulesPackages('corals/utility-webhook');
    }
}
