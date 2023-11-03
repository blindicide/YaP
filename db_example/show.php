
<meta charset="utf-8">
<?php
	$host = 'localhost'; // имя хоста
	$user = 'j19458505';      // имя пользователя
	$pass = '23112004';          // пароль
	$name = 'j19458505_univ';      // имя базы данных
	
	
	$link = mysqli_connect($host, $user, $pass, $name);
    mysqli_query($link, "SET NAMES 'utf8'");
	
	$query = 'SELECT * FROM mydb';
	$res = mysqli_query($link, $query) or die(mysqli_error($link));
	$row1 = mysqli_fetch_assoc($res);
	var_dump($row1); // работник номер 1
	
	$row2 = mysqli_fetch_assoc($res);
	var_dump($row2); // работник номер 2
	
	$row3 = mysqli_fetch_assoc($res);
	var_dump($row3); // работник номер 3
	
	$row4 = mysqli_fetch_assoc($res);
	var_dump($row4); // работник номер 4
	
	$row5 = mysqli_fetch_assoc($res);
	var_dump($row5); // работник номер 5
	
	$row6 = mysqli_fetch_assoc($res);
	var_dump($row6); // работник номер 6
	
	$row7 = mysqli_fetch_assoc($res);
	var_dump($row7); // выведет NULL - работники кончились
?>