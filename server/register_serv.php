<?php 
require_once 'log.php';
/*==========ПРОВЕРКА ВВЕДЕНЫХ ДАННЫХ=========*/
//массив ошибок 
$er = '<strong>ошибка !</strong>';
$errors = ['<div class="alert alert-success" role="alert">Введено верно </div>', "$er пустая строка", "$er не меньше 7 символов",
 "$er не больше 30 символов", "$er латинские буквы или цифры", "$er e-mail введён некорректно", "$er пароли не совпадают"];
 //значение по умолчанию
 $Error__1 = '';
 $Error__2 = '';
 $Error__3 = '';
 $Error__4 = '';
 //----------------проверка логина после отправки
if(isset($_POST['click']) and $_SERVER['REQUEST_METHOD']  == 'POST')
{

function method( $x){
foreach($x as $y){
  if($y){
 return  $y;
  break;
}}
	
}


$data = $_POST;
$data['login'] = $data['login'] ?? '';
$data['login'] = trim($data['login']); 
$Error_1 = [];
$Error_1[] = $data['login'] !=='' ? false : $errors['1'];//проверка пустой строки
$Error_1[] = iconv_strlen($data['login']) >= '6' ? false : $errors['2'];
$Error_1[] = iconv_strlen($data['login']) <= '30' ? false : $errors['3'];
$Error_1[] = ctype_alnum($data['login']) ? false : $errors['4'];
// $result = mysqli_query($connect, "SELECT `login`, `email` FROM `users`");
// $Error_1[] = false;

// foreach($Error_1 as $error){
//   if($error){
//   $Error__1 = $error;
//   break;
// }else{
//   $Error__1 = '';
// }}
$Error__1 = method($Error_1);




//-------------------------------------
//------------------проверка почты
$data['email'] = $data['email'] ?? '';
$data['email'] = trim($data['email']); 
$Error_2 = [];
$Error_2[] = $data['email'] !=='' ? false : $errors['1'];
$Error_2[] = filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? false :  $errors['5'];
foreach($Error_2 as $error){
  if($error){
  $Error__2 = $error;
  break;
}else{
  $Error__2 = '';
}}
//--------------------------------------
//-------------------проверка пароля
$data['password'] = $data['password'] ?? '';
$data['password'] = trim($data['password']); 
$Error_3 = [];
$Error_3[] = trim($data['password']) !=='' ? false : $errors['1'];
$Error_3[] = iconv_strlen($data['password']) > '6' ? false : $errors['2'];
$Error_3[] = iconv_strlen($data['password']) < '30' ? false : $errors['3'];
$Error_3[] = ctype_alnum($data['password']) ? false : $errors['4'];
foreach($Error_3 as $error){
  if($error){
  $Error__3 = $error;
  break;
}else{
  $Error__3 = '';
}}
//-----------------------------------
//-------------------проверка второго пароля
$data['password_2'] = $data['password_2'] ?? '';
$data['password_2'] = trim($data['password_2']); 
$Error__4 = $data['password'] === $data['password_2'] ? '' : $errors['6'];
}




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