<?php

require_once('config.php');

require('core.php');
$site = new SiteEngine();

// загружаем модули
$site
    ->loadModule('guestbook')
    ->loadModule('gallery');

function request() {
    global $config;

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $mod    = $_REQUEST['mod'];
        $action = 'action' . '_' . $_REQUEST['action'];

        $module_path = $config['site']['modules_path'] .
            DIRECTORY_SEPARATOR .
            $mod .
            DIRECTORY_SEPARATOR .
            $mod .
            '.php';

        if (file_exists($module_path)) {
            $class_name = 'Module' . ucfirst($mod);

            if (in_array($action, get_class_methods('Module' . ucfirst($mod)))) {
                $module = new $class_name;
                $module->$action();
            } else {
                echo "Action $action not exists!";
            }
        } else {
            echo "Module $mod not found!";
        }
    }
}

request();

?>
