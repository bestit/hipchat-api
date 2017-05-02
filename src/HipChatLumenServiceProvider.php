<?php
namespace Bestit\HipChat;

use Illuminate\Support\ServiceProvider;
use Bestit;

/**
 * @author Augusto Sotelo L. <agsotelo@gmail.com>
 */
class HipChatLumenServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider and alias
     */
    public function register()
    {
        $this->app->singleton('hipchat', function ($app) {
            return new Client(config('hipchat.api_token'), config('hipchat.server_url'));
        });

        $this->app->alias(Bestit\HipChat\Facade\HipChat::class, 'HipChat');
    }

    /**
     * Load the configuration
     */
    public function boot()
    {
        $this->app->configure('hipchat');
    }
}
