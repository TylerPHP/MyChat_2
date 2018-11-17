<?php
namespace model;
//дочерний класс добовления зарегестрированного пользователя
class User extends UserCheck{
	public $add_chack;
	public $time;
	public $user_add;
    public function __construct(array $post){
	parent::__construct($post);
	if($this->add_chack()){
	$this->add_user();
}}
//проверяет правильно ли пользователь заполнил форму
public function add_chack(){
    if(!$this->login and !$this->email and !$this->password and !$this->password_2){
           return true;
       }else{
       	   return false;
       }
}
//добовляет пользователя в базу
public function add_user(){
	$time = $this->time_add();
	$ip = $this->reg_ip();
    $result = $this->pdo->prepare("INSERT INTO `users` (`id`, `login`, `email`, `password`, `token`, `time_at`, `ip`) VALUES(:id, :login, :email, :password, :token, :time_at, :ip )");
    $x = $result->execute([':id'=>null,
                           ':login'=>$this->post['login'],
                           ':email'=>$this->post['email'],
                           ':password'=>password_hash($this->post['password'], PASSWORD_DEFAULT),
	                       ':token'=>'0',
	                       ':time_at'=>$time,
	                       ':ip'=>$ip]);
      if( $x ){
    	$this->user_add = '1';
    }else{
    	$this->user_add = '0';
    }
}
//узнать ip user
public function reg_ip(){
$client  = @$_SERVER['HTTP_CLIENT_IP'];
$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
$remote  = @$_SERVER['REMOTE_ADDR'];
if(filter_var($client, FILTER_VALIDATE_IP)) $ip = $client;
elseif(filter_var($forward, FILTER_VALIDATE_IP)) $ip = $forward;
else $ip = $remote;
return $ip;
}
//время регистрации
public function time_add(){
time() + (7 * 24 * 60 * 60);
$time_add = date('Y-m-d H:i:s');
return $time_add;
}
}
//---test--class
// $form_err = [
// "login"=>'', 
// "email"=>'',
// "password"=>'', 
// "password_2"=>''
// ];
// $a = new User($form_err);
// var_dump($a->login);
?>
