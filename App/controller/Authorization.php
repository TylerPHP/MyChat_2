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
 public $post = array();
 public $error = array();
 public function __construct(){
      if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$this->pdo = \PDO_connect::connect();
	    $this->post = $_POST;
	    $this->user = new User($this->post);
	    $this->send();
}
}}
?>
