<?php
require_once("log.php");

if( $connect == false)
{
	echo "ошибка проверки данных------!";
	echo mysqli_connect_error();
}

$result = mysqli_query($connect,"SELECT * FROM `users`");

if( $result == false)
{
	echo "ошибка проверки данных------!";
	echo mysqli_connect_error();
}

//узнать информацию о пользователе
while($data = mysqli_fetch_assoc($result))
{
   if(@$_POST['login'] == $data['login'])
   {
    $genderNow = $data['gender'];
    $ageNow = $data['age'];
    $niknameNow = $data['nikname'];
    $userNowUS = $data['login'];
    $iconNowUser = $data['icon'];
    $entrance = true;
   }
   
}

if(iconv_strlen(@$niknameNow) < '3')
{
$niknameNow = @$userNowUS;
}
//очистка сообщения от пробелов 

@$_POST['massege'] =  trim($_POST['massege'], " \t\n\0\x0B");

// добавить время в переменную в формате
time() + (7 * 24 * 60 * 60);
$dataTime = date('d.m.o H:i:s');


if(isset($_POST))
	if(iconv_strlen(@$_POST['massege'])  <= '350' and iconv_strlen(@$_POST['massege']) >= '1')
	{

//подготовка запроса
@$_POST['massege'] = htmlspecialchars(@$_POST['massege']);
 $massegeNow = mysqli_real_escape_string($connect, $_POST['massege']);

//если нет ошибки добовляет в базу
    @$result = mysqli_query($connect,"INSERT INTO `masseges` VALUE(NULL,'".$niknameNow."', '".$userNowUS."','".$dataTime."', '".$ageNow."', '".$genderNow."', '".$massegeNow."','".$iconNowUser."')");

    if( $result == false)
{
  echo "ошибка проверки данных------!";
  echo mysqli_connect_error();
}
  
}

/**
 * выбор последней записи для отсортировки
 */
$result = mysqli_query($connect, "SELECT COUNT(1) FROM `masseges`");

$f = mysqli_fetch_array($result);
$n = $f['0'];
$z = $n - '50';

/**
 * вывод 50 последних записей если перезагружается страница
 */
if(@$_POST['result'] == 'yes')
{

if($n <= '49')
{
  $z = '0';
}

$result = mysqli_query($connect, "SELECT * FROM `masseges` LIMIT $z,$n");

 if( $result == false)
{
  echo "ошибка проверки данных------!";
  echo mysqli_connect_error();
}

while($data = mysqli_fetch_assoc($result))
{
  //перенос строк
  $newTextMess =  wordwrap($data['massege'], 80,"<br />", true);

  echo "<div class='massegeUser'>".
   "<span class='author'>{$data['nikname']}</span> ".
   "<span class='dateTimeMess'>{$data['dataTime']}</span><br>".
   "<img src='{$data['icon']}'  width = '100px' class='ImgUserMess' alt='not picture'>".
           "<div class='TextUserMass'><span class='massUser'>{$newTextMess}</span></div>".
           "</div>";

}
}

$f = $n - '1';
//запросс к базе для вывода последнего сообщения
$result = mysqli_query($connect, "SELECT * FROM `masseges` LIMIT $f,$n");


 if( $result == false)
{
	echo "ошибка проверки данных------!";
	echo mysqli_connect_error();
}
if(iconv_strlen(@$_POST['massege']) >= '1')
while($data = mysqli_fetch_assoc($result))
{
  //перенос строк
  $newTextMess =  wordwrap($data['massege'], 80,"<br />", true);

  echo "<div class='massegeUser'>".
   "<span class='author'>{$data['nikname']}</span> ".
   "<span class='dateTimeMess'>{$data['dataTime']}</span><br>".
   "<img src='{$data['icon']}'  width = '100px' class='ImgUserMess' alt='not picture'>".
           "<div class='TextUserMass'><span class='massUser'>{$newTextMess}</span></div>".
           "</div>";

}
/**
 * удаляет последнюю строку из бд если больше 100
 */

if($n > '100'){
$result = mysqli_query($connect, "DELETE FROM `masseges` LIMIT 1");
if( $result == false)
{
  echo "ошибка проверки данных---удаление---!";
  echo mysqli_connect_error();
}
}

?>