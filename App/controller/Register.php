<?php 
namespace controller;
use  model\User;
//автоматическая загрузка классов
spl_autoload_register(function($class) {   
        require_once('../'.str_replace('\\', '/', $class).'.php'); 
});


class Form{
protected $form = array();
protected $error = array();
public function __construct(){
	$form = $_POST;
$class = new User();
$x = $class->login();
$this->error['login'] = $this->errors(2);
}

public function errors( $number){
$er = '<strong>ошибка !</strong>';
$errors = ['<div class="alert alert-success" role="alert">Введено верно </div>', "$er пустая строка", "$er не меньше 7 символов",
 "$er не больше 30 символов", "$er латинские буквы или цифры", "$er e-mail введён некорректно", "$er пароли не совпадают", "$er такой логин занят", "$er такая почта занята"];
 $show = $errors[$number];
 return $show;
}
public function send(){
	 // echo json_encode(array($this->error));
	echo $this->error;
}}
 // if($_SERVER['REQUEST_METHOD'] == 'POST'){	
$form = new Form;
 $form->send();
 // }












// //-------------------------------------
// //------------------проверка почты
// $data['email'] = $data['email'] ?? false;
// $data['email'] = trim($data['email']); 
// $Error_2 = [];
// $Error_2[] = $data['email'] !=='' ? false : $errors['1'];
// $Error_2[] = filter_var($data['email'], FILTER_VALIDATE_EMAIL) ? false : $errors['5'];
// //---------проверка наличия почты в бд---------
// // $result = $pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
// // $result->execute([':email' => $data['email']]);
// // $Error_2[] = $result->fetchColumn() ? $errors['7'] : false ;
// // $Error__2 = method($Error_2);

// //--------------------------------------
// //-------------------проверка пароля
// $data['password'] = $data['password'] ?? false;
// $data['password'] = trim($data['password']); 
// $Error_3 = [];
// $Error_3[] = trim($data['password']) !=='' ? false : $errors['1'];
// $Error_3[] = iconv_strlen($data['password']) > '6' ? false : $errors['2'];
// $Error_3[] = iconv_strlen($data['password']) < '30' ? false : $errors['3'];
// $Error_3[] = ctype_alnum($data['password']) ? false : $errors['4'];
// // $Error__3 = method($Error_3);
// //-----------------------------------
// //-------------------проверка второго пароля
// $data['password_2'] = $data['password_2'] ?? false;
// $data['password_2'] = trim($data['password_2']); 
// $Error__4 = $data['password'] === $data['password_2'] ? false : $errors['6'];
// echo json_encode(array("login"=>$Error__1, "email"=>$Error__2, "password"=>$Error__3, "password_2"=>$Error__4)); 






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