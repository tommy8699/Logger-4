<?php

namespace AppLogger\Logger;

use Backend\Facades\Backend;
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

    public function registerNavigation()
    {
        return [
            'logger' => [
                'label'       => 'Logger',
                'url'         => Backend::url('applogger/logger/logs'),
                'icon'        => 'icon-bug',
                'permissions' => ['applogger.logger.*'],
                'order'       => 500,

                'sideMenu' => [
                    'logs' => [
                        'label'       => 'Logs',
                        'icon'        => 'icon-list',
                        'url'         => Backend::url('applogger/logger/logs'),
                        'permissions' => ['applogger.logger.access_logs'],
                    ]
                ]
            ]
        ];
    }

    public function registerPermissions()
    {
        return [
            'applogger.logger.access_logs' => [
                'tab'   => 'Logger',
                'label' => 'Access Logs'
            ],
        ];
    }
}
