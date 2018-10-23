<?php
namespace Model;		
/*класс проверки формы */
class User{
	public $login;
	public $email;
	public $time;
	protected $password;
	private $pdo;
	public function __construct(){
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
	public function login(string $login){
		$pdo = $this->pdo;
		$login = $login ?? false;
		$login = trim($login); 
		$error = [];
$error[] = $login !=='' ? false : '1'; //проверка пустой строки
$error[] = iconv_strlen($login) >= '6' ? false : '2';
$error[] = iconv_strlen($login) <= '30' ? false : '3';
$error[] = ctype_alnum($login) ? false : '4';
//-------проверка наличия  логина в бд-------------
$result = $pdo->prepare("SELECT `login` FROM `users` WHERE `login` = :login");
$result->execute([':login' => $login]);
$error[] = $result->fetchColumn() ? '6' : false;
$error_result = $this->method($error);
return $error_result;
}
public function method($error){
      foreach ($error as $er) {
      	if($er){
      		return $er;
      		break;
      	}
      }
}
public function PDO_connect(){

}
}
?>
