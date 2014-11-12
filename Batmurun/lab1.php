<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php
$myfile = fopen("c://lab1//lab1.txt", "r") or die("Unable to open file!");
// Output one character until end-of-file
$string ="";
while(!feof($myfile)) {
	$var = fgetc($myfile);
	if($var == '#') 
	{
	 echo $string.'<br>';
	 $string ="";
	 $var="";
	}	
	$string = $string.$var[0];
}
fclose($myfile);
?>
<form action="writetxt.php" method=post>
  Имя: <input type="text" name="input1"><br>
  <textarea rows="4" cols="50" name="textarea1">
  </textarea>
  <input type="submit" value="Submit">
</form>