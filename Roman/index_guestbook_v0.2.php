<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
		<style>
		p{
			line-height: 1em;
			margin: 0em;
		}

		</style>
		<title>guestbook v0.2 - Гостевая книга</title><!-- Яковлев Роман ИНФ.М-13 -->
	</head>
	<body>
		<h1>Гостевая книга</h1>
		<?php
		//файл гостевой книги пишется и читается в UTF-8
		$file_message="D:\\prog\\OpenServer\\domains\\localhost\\guestbook\\message.txt";
	
		//ЗАПИСЬ
		//пишем в гостевую книгу если были в POST данные 
		if(array_key_exists("form_name",$_POST)){
			if(array_key_exists("form_message",$_POST)){
			$handle_write = fopen($file_message, "ab");
			fwrite($handle_write,"<p>".date("Y-m-d H:i:s", time())." <b>".$_POST[form_name]."</b></p>\n"."<p>".$_POST[form_message]."</p><br>\n");
			fclose($handle_write);
			}
		}
		//ЧТЕНИЕ
		//выводим в тело страницы сообщения гостевой книги
		$handle_read = fopen($file_message, "rb");
		echo "<b>Сообщения:</b><pre>";
		echo fread($handle_read,filesize($file_message));
		echo "</pre>";
		fclose($handle_read);
		?>
		
		
		<p>Добавить сообщение</p>
		<form method="post">
			<label for="form_name">
			Имя:
			</label>
			<input value="<?php 
			if(array_key_exists("form_name",$_POST)){
			echo $_POST[form_name];
			};
			?>" name="form_name" id="form_name">
			<br>
			<label for="form_message">Сообщение:</label>
			<br>
			<input type="text" value="Твое сообщение" autocomplete="off" name="form_message" id="form_message">
			<br>
			<input type="submit" value="Отправить">

		</form>
	</body>

