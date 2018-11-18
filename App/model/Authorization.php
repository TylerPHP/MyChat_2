<?php
// в разработке
namespace model;
session_start();
// if($this->value['kapcha'] == $_SESSION['rand_code'] and !empty($_SESSION['rand_code'])) {
// 				return true;
// 			}else{
// 				return false;
// 			}
// 					$error_reg[] = $this->captcha() ? false : "проверочный текcт введен не верно";

// class Authorization{
// 	public $post = array();
// 	public $pdo = array();
// 	public $token;
// 	public function __construct(array $post){
// 		$this->pdo = \model\PDO_connect::connect();
//         $this->post = $post;
//         $this->input();
// 	}
// 	public function input(){
// 		if($this->post['input'])
// 		if(filter_var($this->post['input'], FILTER_VALIDATE_EMAIL)){
// 			$result = $this->pdo->prepare("SELECT `email`, `password` FROM `users` WHERE `email` = :email");
//             $result->execute([':email' => $this->post['input']]);
//             if($result->fetch(PDO::FETCH_ASSOC)){
//             $password = $result->fetchColumn(1);
//             if(password_verify($password, $this->post['input'])){
//               return false;
//           }
//       }else{
//       	return '2';
//       }
// 		}else{
// 			$result = $this->pdo->prepare("SELECT `login`, `password` FROM `users` WHERE `login` = :login");
//             $result->execute([':login' => $this->post['input']]);
//              if($result->fetch(PDO::FETCH_ASSOC)){
//             $password = $result->fetchColumn(1);
//             if(password_verify($password, $this->post['input'])){
//               return false;
//           }
//       }else{
//       	return '1';
//       }
// 		}}}
// 	$n = new Authorization(['a'=>'b', 'input'=>'log']);
// 	public function input(){
// $login = $this->post['login'];
// $login = $login ?? false;
// $login = trim($login); 
// $error = [];
// $error[] = $login !=='' ? false : '1'; //проверка пустой строки
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
 ?>