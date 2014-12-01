<?php

class ModuleGuestbook extends Module {

    private $module_name = 'guestbook';
    private $file_name   = 'messages.txt';
    private $file_path;

    function __construct() {
        global $config;

        // TODO: выпилить
        $this->file_path =
            $config['site']['modules_path'] .
            DIRECTORY_SEPARATOR .
            $this->module_name .
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
                <p><input name="first-name" class="first-name" placeholder="Имя"></p>
                <p><textarea name="message" class="message" placeholder="Сообщение"></textarea></p>
                <p class="row-button"><input type="submit" value="Отправить"></p>
            </form>
            <div class="{$this->module_name}-board">{$this->getMessages()}</div>
EOT;
    }

    public function action_add() {
        // TODO: юзать буфферизацию вывода
        if ($_POST['first-name'] && $_POST['message']) {
            $handle = fopen($this->file_path, 'a+');
            if ($handle) {
                if (fwrite($handle, $_POST['first-name'] . ': ' . $_POST['message'] . "\n")) {
                    echo "<span class='{$this->module_name}-form-success'>Запись добавлена!</span>";
                }
                fclose($handle);
            } else {
                echo 'Не могу открыть файл: ' . $this->file_path;
            }
        } else {
            echo 'Плохие данные!';
        }
//        header('Location: /');
    }

    private function getMessages() {
        if (file_exists($this->file_path)) {
            $fh = fopen($this->file_path, 'rb');
            $data = fread($fh, filesize($this->file_path));
            fclose($fh);

            if ($data) {
                return nl2br(htmlspecialchars($data));
            }
        } else {
            return 'Сообщений нет';
        }
    }

}

?>
