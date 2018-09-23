<?php  session_start();
include_once 'log.php';
$result = mysqli_query($connect, "SELECT * FROM `users`");

if( $result == false)
{
  echo "ошибка проверки данных------!-1-";
  echo mysqli_connect_error();
}

$browserWin =  @$_SERVER['HTTP_USER_AGENT'];// с какого браузера заходит user

while(@$user = mysqli_fetch_assoc($result))
{

  if(password_verify(@$user['id'], @$_COOKIE['id']) and password_verify($user['login'], $_COOKIE['login']) and password_verify($browserWin, $_COOKIE['browser']) or password_verify(@$user['id'], @$_COOKIE['id']) and password_verify($user['email'], $_COOKIE['login']) and password_verify($browserWin, $_COOKIE['browser']))// проверка соответствия данных user
  {
    $genderNow = $user['gender'];
    $ageNow = $user['age'];
    $niknameNow = $user['nikname'];
    $userNow = $user['login'];
    $entrance = true;
  }
}

//перенаправлению в случае не удачи 
if(!isset($entrance))
  header('Location: index.php');

$err = false;

$_SESSION['sessid'] = random_int(1,1000000);

$imgDir = "CSS/images/".$userNow;
  @mkdir($imgDir, 0777); // добовляет в дирикторию 

if(@isset($_REQUEST['upload']) and $_SESSION['sessid'] !== $_POST['sessid'])//при нажатии
{
  $data = $_FILES['file'];
  $tmp = $data['tmp_name'];
  $sizeImg = $data['size'];
  if(is_uploaded_file($tmp)) 
  {
    $info = @getimagesize($tmp);
    if(preg_match('{image/(.*)}is', $info['mime'], $p))
      if($sizeImg < 3000000 and $info['0'] <= 300 and $info['1'] <= 300){
       $name = "$imgDir/".time().".".$p[1];
     move_uploaded_file($tmp, $name);//добовляет в дирикторию картинку
     $result = mysqli_query($connect, "UPDATE `users` SET `icon` = '".$name."'  WHERE `login` ='".$userNow."' ");
     if( $result == false)
     {
      $err = "ошибка проверки данных------!-2-";
      echo mysqli_connect_error();
    }
  } else {
    $err= "<p style ='color: yellow;'>picture of the wrong size!!</p>";
  }
} else {
  $err = "<p style ='color: yellow;'>picture of the wrong format!!</p>";
}
}

//delete old picture
$arr = glob("$imgDir/*");
$count = count($arr);

if($count >='4')
{
  unlink(reset($arr));
}

$endArr = end($arr);

// удаление куки при нажатии exit
if(isset($_REQUEST['exitOne']))
{
foreach($_COOKIE as $key => $value)
{
     SETCOOKIE($key,$value,TIME()-10000,"/");
}
 header('Location: index.php');
}

?>