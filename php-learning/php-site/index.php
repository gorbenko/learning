<?php
    // используйте не интерпритируемые кавычки, если не нужны выражения в строках
    require('application.php');
?>
<!DOCTYPE html>
<html>
<head lang="<?= $config['site']['lang'] ?>"> <!-- оператор "=" работает как echo, символ ";" в таком случае не нужен -->
    <meta charset="UTF-8">
    <title><?= $config['site']['title'] ?></title> <!-- секции конфига вводят порядок в структуру -->
    <link href="static/style.css" rel="stylesheet" type="text/css">
</head>
<body>

<?php
    // используйте паттерн Factory
    $guestbook = new ModuleGuestbook();
    $gallery =   new ModuleGallery();
?>

<div class="left">
    <?php
        $guestbook->render();
    ?>
</div>

<div class="right">
    <?php
        $gallery->render();
    ?>
</div>

</body>
</html>
