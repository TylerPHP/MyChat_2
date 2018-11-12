<?php
session_start();
//автоматическая загрузка классов
spl_autoload_register(function($class) {   
 require_once(str_replace('\\', '/', $class).'.php'); 
});
if($this->value['kapcha'] == $_SESSION['rand_code'] and !empty($_SESSION['rand_code'])) {
				return true;
			}else{
				return false;
			}
					$error_reg[] = $this->captcha() ? false : "проверочный текcт введен не верно";

class Authorization{
	public $post
	public $pdo = array();
	public $token;
	public function __construct(array $post){
		$this->pdo = \PDO_connect::connect();
        $this->post = $post;

	}
	public function input(){
		if(filter_var($this->post['login'], FILTER_VALIDATE_EMAIL)){
			
		}
	}
	public function input(){
$login = $this->post['login'];
$login = $login ?? false;
$login = trim($login); 
$error = [];
$error[] = $login !=='' ? false : '1'; //проверка пустой строки
//-------проверка наличия  логина в бд-------------
$result = $this->pdo->prepare("SELECT `login` FROM `users` WHERE `login` = :login");
$result->execute([':login' => $login]);
$error[] = $result->fetchColumn() ? '7' : false;
$error_result = $this->method($error);
$this->login = $error_result;
return $error_result;
}
public function email(){
$email = $this->post['email'];
$email = $email ?? false;
$email = trim($email); 
$error = [];
$error[] = $email !=='' ? false :'1';
$error[] = filter_var($email, FILTER_VALIDATE_EMAIL) ? false : '5';
//---------проверка наличия почты в бд---------
$result = $this->pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
$result->execute([':email' => $email]);
$error[] = $result->fetchColumn() ? '8' : false ;
$error_result = $this->method($error);
$this->error_result = $error_result;
$this->email = $error_result;
}
}
?>