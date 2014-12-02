<?php setcookie('day', 'happy'); ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<pre>
<?php
print_r($_REQUEST);

function makeSelect($array, $name, $options) {
	$val = $array[$name];

	$options_str = '';
	$selected = '';

	foreach ($options as $key => $text) {
		if ($key == $val) {
			$selected = 'selected';
		} else {
			$selected = '';
		}

		$options_str .= "<option " . $selected . " value=" . $key . ">" . $text . "</option>";
	}

	echo "<select name=" . $name . ">" . $options_str . "</select>";
}
?>
</pre>
	<form method="post">
		<label for="first-name">Имя:&nbsp;</label>
		<input value="<?php echo $_POST['first-name']; ?>" name="first-name" id="first-name">
		<br>
		<label>Домашние животные: </label>
			<?php printSelect($_POST, 'animals', array(
				'Dog' => 'Собака',
				'Cat' => 'Кошка',
			)); ?> 
		<br>
		<label>Автомобиль: </label>
			<?php makeSelect($_POST, 'cars', array(
				'BMW' => 'БМВ',
				'Mersedes' => 'Мерседес',
			)); ?>
		<br>
		<input type="submit" value="Send">
	</form>
</body>
</html>
