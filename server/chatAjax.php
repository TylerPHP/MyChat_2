<?php 
include 'log.php';
$result = mysqli_query($connect, "SELECT `nikname` FROM `users`");

if( $result == false)
{
  echo "ошибка проверки данных------!";
  echo mysqli_connect_error();
}



  if($_POST['age'] <= '110' and $_POST['age'] >= '7')
  {
     $ageTru = '1';
  }
   if($_POST['gender'] == '2')
  {
    $gender = 'Woman';
    
  }
     if($_POST['gender'] == '1')
  {
    $gender = 'Man';
   
    
  }

while ($data = mysqli_fetch_assoc($result))
{
  if($data['nikname'] !== $_POST['nikname'] and strlen($_POST['nikname']) >= '6' and strlen($_POST['nikname']) <= '25')
  {
     $topik = true;
   
  }else{
    $topik = false;
  }

}


  if( isset($ageTru) and  $topik)
{
 echo "Good";
 $resulte = mysqli_query($connect, "UPDATE `users` SET `nikname`='".$_POST['nikname']."', `age`= '".$_POST['age']."', `gender` = '".$gender."' WHERE `login` = '".$_POST['login']."'");
 if( $resulte == false)
{
  echo "Not";
  echo mysqli_connect_error();
}
if( $resulte == false)
{
  echo "Not";
  echo mysqli_connect_error();
}

}else{
  echo "Not";
}

?>