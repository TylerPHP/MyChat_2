<?php
// class User_check{
// 	public $login;
// 	public $email;
// 	public $password;
// 	public $password_2;
// 	protected $pdo;
// 	public $error = array();
// 	public $post = array();
// 	// public function __construct(array $post){
// 	// $this->PDO_connect();
// 	// $this->post = $post;
// 	// }
// public function login(){
// $login = $this->post['login'];
// $login = $login ?? false;
// $login = trim($login); 
// $error = [];
// $error[] = $login !=='' ? false : '1'; //проверка пустой строки
// $error[] = iconv_strlen($login) >= '6' ? false : '2';
// $error[] = iconv_strlen($login) <= '30' ? false : '3';
// $error[] = ctype_alnum($login) ? false : '4';
// //-------проверка наличия  логина в бд-------------
// $result = $this->pdo->prepare("SELECT `login` FROM `users` WHERE `login` = :login");
// $result->execute([':login' => $login]);
// $error[] = $result->fetchColumn() ? '7' : false;
// $error_result = $this->method($error);
// $this->login = $error_result;
// return $error_result;
// }
// public function email(){
// $email = $this->post['email'];
// $email = $email ?? false;
// $email = trim($email); 
// $error = [];
// $error[] = $email !=='' ? false :'1';
// $error[] = filter_var($email, FILTER_VALIDATE_EMAIL) ? false : '5';
// //---------проверка наличия почты в бд---------
// $result = $this->pdo->prepare("SELECT `email` FROM `users` WHERE `email` = :email");
// $result->execute([':email' => $email]);
// $error[] = $result->fetchColumn() ? '8' : false ;
// $error_result = $this->method($error);
// $this->error_result = $error_result;
// $this->email = $error_result;
// }
// public function password(){
// $password = $this->post['password'];
// $password = $password ?? false;
// $password = trim($password); 
// $error = [];
// $error[] = trim($password) !=='' ? false : '1';
// $error[] = iconv_strlen($password) > '6' ? false : '2';
// $error[] = iconv_strlen($password) < '30' ? false : '3';
// $error[] = ctype_alnum($password) ? false : '4';
// $error_result = $this->method($error);
// $this->password = $error_result;
// }
// public function password_2(){
// $password_2 = $this->post['password_2'];
// $password_2 = $password_2 ?? false;
// $password_2 = trim($password_2); 
// $error = $this->post['password'] === $password_2 ? false : '6';
// $this->password_2 = $error;
// }
// //метод перебора массива ошибок
// public function method($error){
//       foreach ($error as $er) {
//       	if($er){
//       		return $er;
//       		break;
//       	}}}
// protected function PDO_connect(){
// 	$host = 'localhost';
// 	$database = 'ChatTwo';
// 	$user = 'root';
// 	$pass = '';
// 	$dsn = "mysql:host=$host;dbname=$database;";
//   // $options = array(
//   //     PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
//   //     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//   // );
// 	$pdo = new \PDO($dsn, $user, $pass);
// 	$this->pdo = $pdo;	
// }}
?>