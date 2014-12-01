<?php

class SiteEngine {

    public function loadModule($module_name) {
        global $config;

        $module_path = $config['site']['modules_path'] . DIRECTORY_SEPARATOR . $module_name . '.php';

        if (file_exists($module_path)) {
            require($module_path);
        }
    }

}

?>
