<?php
namespace Model;		
/*класс проверки формы */
class User{
	public $login;
	public $email;
	public $time;
	protected $password;
	protected $pdo;
	public $form = array();
	public function __construct(array $form){
	$this->PDO_connect();
	$this->form = $form;
	}
	public function login(){
		$login = $this->form['login'];
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
