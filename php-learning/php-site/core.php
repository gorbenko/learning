<?php

require('modules/module.php');

define('MESSAGE_SUCCESS', 'success');
define('MESSAGE_FAIL',    'fail');
define('MESSAGE_NORMAL',  'normal');

class Site {

    public function loadModule($module_name) {
        $module_path = Module::buildModulePath($module_name);

        if (file_exists($module_path)) {
            require_once($module_path);
        }

        return $this;
    }

    static function printMessage($message, $theme, $val = false) {
        $result = "<div class='message message-{$theme}'>{$message}</div>";

        if (!$val) {
            echo $result;
        } else {
            return $result;
        }
    }

}

?>
