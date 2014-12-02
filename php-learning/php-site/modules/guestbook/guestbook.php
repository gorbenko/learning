<?php

class ModuleGuestbook extends Module {

    private $module_name = 'guestbook';
    private $file_name   = 'messages.txt';
    private $file_path;

    function __construct() {
        $this->file_path =
            Module::buildModulePath($this->module_name, true) .
            DIRECTORY_SEPARATOR .
            $this->file_name;
    }

    public function render() {
        // использовать билдер форм!

        echo <<<EOT
            <h1 class="title">Гостевая книга</h1>
            <form method="post"
                class="{$this->module_name}-form"
                name="{$this->module_name}-form"
                action="?mod=$this->module_name&action=add"
            >
                <p><input required name="first-name" class="guestbook-form-first-name" placeholder="Имя"></p>
                <p><textarea required name="message" class="guestbook-form-message" placeholder="Сообщение"></textarea></p>
                <p class="row-button"><input type="submit" value="Отправить"></p>
            </form>
            <div class="{$this->module_name}-board">{$this->getMessages()}</div>
EOT;
    }

    public function action_add() {
        // TODO: кидать сообщения в стек и выводить
        if ($_POST['first-name'] && $_POST['message']) {
            $handle = fopen($this->file_path, 'a+');
            if ($handle) {
                if (fwrite($handle, $_POST['first-name'] . ': ' . $_POST['message'] . "\n")) {
                    Site::printMessage('Запись добавлена!', MESSAGE_SUCCESS);
                }
                fclose($handle);
            } else {
                Site::printMessage("Не могу открыть файл: {$this->file_path}", MESSAGE_FAIL);
            }
        } else {
            Site::printMessage('Плохие данные!', MESSAGE_FAIL);
        }
//        header('Location: /');
    }

    private function getMessages() {
        $fsize = filesize($this->file_path);

        if (file_exists($this->file_path) && $fsize) {
            $handle = fopen($this->file_path, 'rb');
            $data = fread($handle, $fsize);
            fclose($handle);
            return nl2br(htmlspecialchars($data));
        } else {
            return Site::printMessage('Сообщений нет', MESSAGE_NORMAL, true);
        }
    }

}

?>
