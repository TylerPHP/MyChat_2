<?php 
namespace controller;
use model\User;
//автоматическая загрузка классов
spl_autoload_register(function($class) {   
 require_once('../'.str_replace('\\', '/', $class).'.php'); 
});
//класс формирования ошибок
class Form{
protected $post = array();
protected $error = array();
protected $user;//объект модели
public function __construct(){
	if($_SERVER['REQUEST_METHOD'] == 'POST'){
$this->post = $_POST;
$this->user = new User($this->post);
$this->send();
}}
public function errors($number){
$er = '<strong>ошибка !</strong>';
$errors = [
'<div class="alert alert-success" role="alert">Введено верно </div>',
"$er пустая строка",
"$er не меньше 7 символов",
"$er не больше 30 символов",
"$er латинские буквы или цифры",
"$er e-mail введён некорректно",
"$er пароли не совпадают",
"$er такой логин занят",
"$er такая почта занята"
];
$show = $number ?  $errors[$number] : false;
return $show;
}
public function send(){
$user = $this->user;
$form_err = [
"login"=>$this->errors($user->login), 
"email"=>$this->errors($user->email),
"password"=>$this->errors($user->password), 
"password_2"=>$this->errors($user->password_2)
];
//отправка массива ошибок
if($user->add_user == '1'){
echo json_encode(array('user' => 'ok'));
}else{
$ajax = json_encode($form_err);
if($ajax) echo $ajax;
 }}}
$form = new Form;



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