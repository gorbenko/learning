<?php
    require_once('config.php');
?>
<!DOCTYPE html>
<html>
<head lang="<?= $config['site']['lang'] ?>"> <!-- оператор "=" работает как echo, символ ";" в таком случае не нужен -->
    <meta charset="UTF-8">
    <title><?= $config['site']['title'] ?></title> <!-- секции конфига вводят порядок в структуру -->
    <link href="static/style.css" rel="stylesheet" type="text/css">
    <script src="static/jquery.js" type="text/javascript"></script>
</head>
<body>

<?php
    require('application.php');

    $guestbook = new ModuleGuestbook();
    $gallery   = new ModuleGallery();
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
