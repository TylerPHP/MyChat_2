<?php 
//автоматическая загрузка классов
spl_autoload_register(function($class) {  
if($class == 'PDO_connect'){
 require_once('../model/'.str_replace('\\', '/', $class).'.php');
}else{
 require_once('../'.str_replace('\\', '/', $class).'.php'); 
}
});

class Authoriz{
 public $autoriz; // объект модели
 public $post = array();
 public $error = array();
 public function __construct(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
	    $this->post = $_POST;
	    $this->user = new Autarization($this->post);
	    $this->send();
}
}
public function send($number){
$er = '<strong>ошибка !</strong>';
$errors = [
"$er введите ваши данные",
"$er данный логин не найден",
"$er данная почта не найдена",
"$er данные введены не верно"
];
}
}
?>
