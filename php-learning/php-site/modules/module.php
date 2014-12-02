<?php

class Module {

    static function buildModulePath($module_name, $dir = false) {
        global $config;

        $result = $config['site']['modules_path'] .
            DIRECTORY_SEPARATOR .
            $module_name .
            DIRECTORY_SEPARATOR;

        if (!$dir) {
            $result .= $module_name . '.php';
        }

        return $result;
    }

    /**
     * Render view
     *
     */
    public  function render() {}
}

?>
