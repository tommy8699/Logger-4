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

}
