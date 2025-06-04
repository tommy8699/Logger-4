<?php

namespace AppLogger\Logger\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use AppLogger\Logger\Models\Log;

class Logs extends Controller
{
    public $implement = [
        'Backend\Behaviors\ListController',  // zobrazenie zoznamu záznamov
        'Backend\Behaviors\FormController',  // formulár pre vytváranie/úpravu
    ];

    // Cesty k konfigurácii pre ListController a FormController
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';

    public $requiredPermissions = ['applogger.logger.access_logs'];

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('AppLogger.Logger', 'logger', 'logs'); // aktivuje menu v admin paneli
    }
}
