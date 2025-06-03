<?php

namespace AppLogger\Logger;

use System\Classes\PluginBase;

class Plugin extends PluginBase
{
    public function pluginDetails()
    {
        return [
            'name' => 'AppLogger.Logger',
            'description' => 'Logger plugin for tracking arrivals',
            'author' => 'Tvoje Meno',
            'icon' => 'icon-clock'
        ];
    }

    public function register()
    {
        // Register routes for API
        \Event::listen('router.before', function ($route, $request) {
            require __DIR__ . '/routes.php';
        });
    }
}
