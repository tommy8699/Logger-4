<?php

namespace AppLogger\Logger\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Logs extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',
        'Backend\Behaviors\FormController',
    ];

    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = ['applogger.logger.access_logs'];

    public function __construct()
    {
        parent::__construct();
        BackendMenu::setContext('AppLogger.Logger', 'logger', 'logs');
    }
}
