<?php

class ModuleGallery extends Module {

    private $module_name = 'gallery';

    public function render() {
        echo <<<EOT
            <div class="$this->module_name"><h1>Фотогаллерея</h1></div>
EOT;
    }

}

?>
