<?php

require_once('module.php');

class ModuleGuestBook extends Module {

    private $module_name = 'guestbook';

    public function render() {
        // ипользуйте билдер форм
        echo <<<EOT
            <h1 class="title">Гостевая книга</h1>
            <form method="post" class="$this->module_name" name="$this->module_name">
                <p><input name="first-name" class="first-name" placeholder="Имя"></p>
                <p><textarea name="message" class="message" placeholder="Сообщение"></textarea></p>
                <p class="row-button"><input type="submit" value="Отправить"></p>
            </form>
EOT;
    }

}

?>
