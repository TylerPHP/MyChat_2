<?php 
require_once 'log.php';
/*==========ПРОВЕРКА ВВЕДЕНЫХ ДАННЫХ=========*/
//массив ошибок 
$er = '<strong>ошибка !</strong>';
$errors = ['<div class="alert alert-success" role="alert">Введено верно </div>', "$er пустая строка", "$er не меньше 7 символов",
 "$er не больше 30 символов", "$er латинские буквы или цифры", "$er e-mail введён некорректно", "$er пароли не совпадают", "такой логин занят"];
 //значение по умолчанию
 $Error__1 = '';
 $Error__2 = '';
 $Error__3 = '';
 $Error__4 = '';
//----------

$login_xhr = $_POST['login'] ?? false ;
$email_xhr = $_POST['email'] ?? false;
$epp = isset($login_xhr) ? $er.'этот логин занят' : false;
$epp_2 =  isset($login_xhr) ? $er.'этот логин занят' : false;

if(isset($epp)){
   $enter = $epp;
}

if(isset($epp_2)){
   $enter = $epp_2;
}


if($login_xhr or  $email_xhr){
$result = $pdo->prepare("SELECT `login`, `email` FROM `users` WHERE `login` = :login OR `email` = :email ");
 $result->execute([':login' => $login_xhr, ':email' => $email_xhr]);
if($result->fetchColumn()){
	echo $enter;
}else{
	echo '0';
}

}

 //----------------проверка логина после отправки
// if(isset($_POST['click']) and $_SERVER['REQUEST_METHOD']  == 'POST')
// { 
//функция перебора ошибок
// function method( $x){
// foreach($x as $y){
//   if($y){
//  return  $y;
//   break;}}}
// $data = $_POST;
// $data['login'] = $data['login'] ?? false;
// if($data['login'] ){
// $data['login'] = trim($data['login']); 
// $Error_1 = [];
// $Error_1[] = $data['login'] !=='' ? false : $errors['1'];//проверка пустой строки
// $Error_1[] = iconv_strlen($data['login']) >= '6' ? false : $errors['2'];
// $Error_1[] = iconv_strlen($data['login']) <= '30' ? false : $errors['3'];
// $Error_1[] = ctype_alnum($data['login']) ? false : $errors['4'];
// $Error__1 = method($Error_1);
// echo $Error__1;
// }
// //-------------------------------------
// //------------------проверка почты
// $data['email'] = $data['email'] ?? false;
// if($data['email']){
// $data['email'] = trim($data['email']); 
// $Error_2 = [];
// $Error_2[] = $data['email'] !=='' ? false : $errors['1'];
// $Error_2[] = filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? false :  $errors['5'];
// $Error__2 = method($Error_2);
// echo $Error__2;
// }
// //--------------------------------------
// //-------------------проверка пароля
// $data['password'] = $data['password'] ?? false;
// if($data['password']){
// $data['password'] = trim($data['password']); 
// $Error_3 = [];
// $Error_3[] = trim($data['password']) !=='' ? false : $errors['1'];
// $Error_3[] = iconv_strlen($data['password']) > '6' ? false : $errors['2'];
// $Error_3[] = iconv_strlen($data['password']) < '30' ? false : $errors['3'];
// $Error_3[] = ctype_alnum($data['password']) ? false : $errors['4'];
// $Error__3 = method($Error_3);
// echo $Error__3;
// }
// //-----------------------------------
// //-------------------проверка второго пароля
// $data['password_2'] = $data['password_2'] ?? false;
// if($data['password_2']){
// $data['password_2'] = trim($data['password_2']); 
// $Error__4 = $data['password'] === $data['password_2'] ? '' : $errors['6'];
// }
// // }





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