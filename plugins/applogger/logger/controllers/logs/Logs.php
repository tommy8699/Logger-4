<?php

namespace AppLogger\Logger\controllers\logs;

use Backend\Classes\Controller;
use BackendMenu;

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
