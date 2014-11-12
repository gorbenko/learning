<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>

<?php
$myfile = fopen('lab1.txt', 'r');
// Output one character until end-of-file
$string = '';
if ($myfile) {
    while(!feof($myfile)) {
        $var = fgetc($myfile);
        if ($var == '#') {
            echo $string, '<br>';
            $string = '';
            $var = '';
        }
        $string = $string . $var[0];
    }
    fclose($myfile);
}
?>
<form action="writetxt.php" method=post>
    Имя: <input type="text" name="input1"><br>
    <textarea rows="4" cols="50" name="textarea1" placeholder="Сообщение"></textarea>
    <input type="submit" value="Submit">
</form>

</body>
</html>
