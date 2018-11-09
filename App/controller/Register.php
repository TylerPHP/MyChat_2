<?php 
namespace Controller;
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
if($user->user_add == '1'){
echo json_encode(array('user' => 'ok'));
}else{
$ajax = json_encode($form_err);
if($ajax) echo $ajax;
 }
}}
$form = new Form;
?>