<?php 
require_once 'log.php';

//какой метод отправки данных был использован на страеице
if($_SERVER['REQUEST_METHOD']  == 'POST')
{
  $data = $_POST;
}

/*==========ПРОВЕРКА ВВЕДЕНЫХ ДАННЫХ=========*/
//вывод ошибок
$errors = ['Введено верно', '  <strong>ошибка !</strong>пустая строка', '  <strong>ошибка !</strong>не меньше 6 символов',
 '  <strong>ошибка !</strong>не больше 25 символов', '  <strong>ошибка !</strong>логин может состоять из латинских букв и цифр'];
$Error__1 = '';

if(isset($_POST['click']) )
{
  //----------------проверка логина
$Error_1 = [];
$Error_1[] = trim($data['login']) !=='' ? false : $errors['1'];//проверка пустой строки
$Error_1[] = iconv_strlen($data['login']) >= '6' ? false : $errors['2'];
$Error_1[] = iconv_strlen($data['login']) <= '25' ? false : $errors['3'];
$Error_1[] = ctype_alnum($data['login']) ? false : $errors['4'];
$result = mysqli_query($connect, "SELECT `login`, `email` FROM `users`");
$Error_1[] = false;

foreach($Error_1 as $error){
  if($error){
  $Error__1 = $error;
  break;
}else{
  $Error__1 = '';
}
}
}
//-------------------------------------
//------------------проверка почты








//   if( trim($data['Login']) !=='' and iconv_strlen($data['Login']) >= 6 and iconv_strlen($data['Login']) <= 25 and ctype_alnum($data['Login']))
//   {
//     $resultEnter[] = '1';
//     $errors[] = 'ок';
//     $EnterError[] = '<div class="alert alert-success" role="alert">
//     <strong></strong>'.$errors[0].'</div>';

//   }else{

//     $errors[] = 'no correct login!';
//     $EnterError[] = '<div class="alert alert-danger" role="alert">
//     <strong>error!</strong>'.$errors[0].'</div>';
//   }

//   if( trim($data['email']) !=='' and filter_var($data['email'], FILTER_VALIDATE_EMAIL))
//   {   
//    $resultEnter[] = '1';
//    $errors[] = 'ок';
//    $EnterError[] = '<div class="alert alert-success" role="alert">
//    <strong></strong>'.$errors[1].'</div>';
//  }else{
//    $errors[] = 'no correct email!';
//    $EnterError[] = '<div class="alert alert-danger" role="alert">
//    <strong>error!</strong>'.$errors[1].'</div>';
//  }

//  if(trim($data['password']) !=='' and iconv_strlen($data['password']) > 7 and iconv_strlen($data['password']) < 18 )
//  {
//   $resultEnter[] = '1';
//   $errors[] = 'ок';
//   $EnterError[] = '<div class="alert alert-success" role="alert">
//   <strong></strong>'.$errors[2].'</div>';

// }else{
//   $errors[] = 'is incorrect!';
//   $EnterError[] = '<div class="alert alert-danger" role="alert">
//   <strong>error!</strong>'.$errors[2].'</div>';
// }

// if($data['password-confirmation'] !== $data['password'])
// {
//  $errors[] = 'Passwords do not match!';
//  $EnterError[3] = '<div class="alert alert-danger" role="alert">
//  <strong>error!</strong>'.$errors[3].'</div>';
// }else{
//  $resultEnter[] = '1';
// }

// }
// /*---------------------------------------------------------*/
// /*ip user*/
// $client  = @$_SERVER['HTTP_CLIENT_IP'];
// $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
// $remote  = @$_SERVER['REMOTE_ADDR'];
// if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
// elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
// else $ip = $remote;
// /*----------*/
// /*-----time in base-----*/
// time() + (7 * 24 * 60 * 60);
// $dataTime = date('l jS \of F Y h:i:s A');
// /*--------------------*/
// /*----add in base------*/
// $result = mysqli_query($connect, "SELECT * FROM `users`");


// $test= '0';
//     if(count($resultEnter) == '4'){
//   while($user = mysqli_fetch_assoc($result))
//   {
//     if($data['Login'] !== $user['login'] or  $data['email'] !== $user['email']){

//     $test = '1';

//     }else{
    
//       $userError = '<div class="alert alert-danger" role="alert">
//       <strong>error!</strong>such mail or login is already registered---1---</div>';
//   }}}

//     if($test == '1'){
//            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

//       $resulte = mysqli_query($connect, "INSERT INTO `users` (`id`, `login`, `email`, `password`, `dataTime`, `nikname`, `age`, `gender`, `icon`, `ip`) VALUES(NULL, '".$data['Login']."', '".$data['email']."', '".$data['password']."', '".$dataTime."','', '0', '','', '".$ip."')");

//       // header('Location:index.php');

//       if( $resulte == false)
//       {
//        echo mysqli_connect_error();
//         $userError = '<div class="alert alert-danger" role="alert">
//         <strong>error!</strong>such mail or login is already registered---2---</div>';
//       }
//     }/* else{
//        $userError = '<div class="alert alert-danger" role="alert">
//         <strong>error!</strong>error!! was not added to the database---3---</div>';
//     }*/
    
    ?>