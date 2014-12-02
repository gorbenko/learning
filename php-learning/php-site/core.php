<?php

require('modules/module.php');

class SiteEngine {

    public function loadModule($module_name) {
        global $config;

        $module_path = $config['site']['modules_path'] .
            DIRECTORY_SEPARATOR .
            $module_name .
            DIRECTORY_SEPARATOR .
            $module_name .
            '.php';

        if (file_exists($module_path)) {
            require_once($module_path);
        }

        return $this;
    }

}

?>
