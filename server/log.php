<?php
$connect = mysqli_connect('localhost', 'root', '', 'Chat');

if( $connect == false)
{
	echo "ошибка проверки данных------!";
	echo mysqli_connect_error();
}

$result = mysqli_query($connect, "SELECT * FROM `users`");
 if( $result == false)
{
	echo "ошибка проверки данных------!";
	echo mysqli_connect_error();
}
?>
