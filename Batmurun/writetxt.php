<?php
$filename = "c://lab1/lab1.txt";
$handle = fopen($filename, "a");
fwrite($handle, "Имя:".$_POST['input1'].'#');
fwrite($handle, $_POST['textarea1'].'#');
fwrite($handle, '-------------------------------#');
fclose($handle);
header('Location: lab1.php');    
exit();
?>