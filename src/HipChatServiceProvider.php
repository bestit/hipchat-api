<?php

namespace Bestit\HipChat;

use Illuminate\Support\ServiceProvider;

/**
 * Class HipChatServiceProvider
 *
 * @package Bestit\HipChat
 */
class HipChatServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/hipchat.php' => config_path('hipchat.php')
        ], 'hipchat');
    }

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('hipchat', function () {
            return new Client(config('hipchat.api_token'), config('hipchat.server_url'));
        });
    }
}
