<?php
namespace Model;		
/*класс проверки формы */
class User{
	public $login;
	public $email;
	public $time;
	public $password;
	protected $pdo;
	public $post = array();
	public function __construct(array $post){
	$this->PDO_connect();
	$this->post = $post;
	}
public function login(){
$login = $this->post['login'];
$login = $login ?? false;
$login = trim($login); 
$error = [];
$error[] = $login !=='' ? false : '1'; //проверка пустой строки
$error[] = iconv_strlen($login) >= '6' ? false : '2';
$error[] = iconv_strlen($login) <= '30' ? false : '3';
$error[] = ctype_alnum($login) ? false : '4';
//-------проверка наличия  логина в бд-------------
$result = $this->pdo->prepare("SELECT `login` FROM `users` WHERE `login` = :login");
$result->execute([':login' => $login]);
$error[] = $result->fetchColumn() ? '6' : false;
$error_result = $this->method($error);
//выводит номер ошибки
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
$error[] = $result->fetchColumn() ? '7' : false ;
$error_result = $this->method($error);
return $error_result;
}
public function password(){
$password = $this->post['password'];
$password = $password ?? false;
$password = trim($password); 
$error = [];
$error[] = trim($password) !=='' ? false : '1';
$error[] = iconv_strlen($password) > '6' ? false : '2';
$error[] = iconv_strlen($password) < '30' ? false : '3';
$error[] = ctype_alnum($password) ? false : '4';
$error_result = method($error);	
return $error_result;
}
//метод перебора массива ошибок
public function method($error){
      foreach ($error as $er) {
      	if($er){
      		return $er;
      		break;
      	}
      }
}
private function PDO_connect(){
	$host = 'localhost';
	$database = 'ChatTwo';
	$user = 'root';
	$pass = '';
	$dsn = "mysql:host=$host;dbname=$database;";
  // $options = array(
  //     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
  // );
	$pdo = new \PDO($dsn, $user, $pass);
	$this->pdo = $pdo;	
}
}
?>
