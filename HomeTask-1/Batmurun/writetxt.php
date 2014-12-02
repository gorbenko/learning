<?php
	$filename = 'lab1.txt';
	$handle = fopen('lab1.txt', "a+") or die("Unable to open file!");
	fwrite($handle, 'Имя:' . $_POST['input1'] . '#');
	fwrite($handle, $_POST['textarea1'] . '#');
	fwrite($handle, '-------------------------------#');
	fclose($handle);
	header('Location: /');
	exit();
?>
