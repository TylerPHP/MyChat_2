<?php  require_once('header.php');?>

<div class="text-center p-4 border border-white bg-secondary">
  <h1 class="h4 mb-4 ">Регистрация</h1>
  <div class="text-danger login_error"></div>
  <form class="form-signin" role="form" method="POST" action="App/controller/Register.php">
    <input type="text" name="login" class="form-control " placeholder="Введите логин" value="<?=$_POST['login'] ?? '';?>" required autofocus>
    <div class="text-danger email_error"></div>
    <input type="text" name="email" class="form-control " placeholder="Введите почту" value="<?=$_POST['email'] ?? '';?>" required> 
    <div class="text-danger  password_error"></div>
    <input type="password" name="password" class="form-control" placeholder="Введите пароль" value="<?=$_POST['password'] ?? '';?>" required>
    <div class="text-danger password_error_2"></div>
    <input type="password" name="password_2" class="form-control" placeholder="Подтвердите пароль" value="<?=$_POST['password_2'] ?? '';?>" required>
    <button class="btn btn-lg btn-primary btn-block" name="click" type="submit">Регистрация</button>
  </form>
</div>

<script type="text/javascript">
$(document).ready(function(){
$('button[name=click]').on('click', function(){
  return false;
}).on('click', function(){ 
var form = $(".form-signin").serialize();
$.post("App/controller/Register.php",form, function( data ){
 
$(".login_error").html(data.login);
$(".email_error").html(data.email);
$(".password_error").html(data.password);
$(".password_error_2").html(data.password_2);
},"json");
});
});
</script>
<?php  require_once('footer.php');?>