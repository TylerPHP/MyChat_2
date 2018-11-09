<?php  require_once('header.php');?>

<div class="text-center p-4 border border-white bg-secondary all_reg">
  <h1 class="h4 mb-4 reg_loader">Регистрация</h1>
  <div class="text-danger login_error"></div>
  <form class="form-signin" role="form" method="POST" action="App/controller/Register.php">
    <input type="text" name="login" class="form-control" placeholder="Введите логин" value="<?=$_POST['login'] ?? '';?>" required autofocus">
    <div class="text-danger email_error"></div>
    <input type="text" name="email" class="form-control" placeholder="Введите почту" value="<?=$_POST['email'] ?? '';?>" required> 
    <div class="text-danger  password_error"></div>
    <input type="password" name="password" class="form-control" placeholder="Введите пароль" value="<?=$_POST['password'] ?? '';?>" required>
    <div class="text-danger password_error_2"></div>
    <input type="password" name="password_2" class="form-control" placeholder="Подтвердите пароль" value="<?=$_POST['password_2'] ?? '';?>" required>
    <button class="btn btn-lg btn-primary btn-block" name="click" type="submit">Регистрация</button>
  </form>
</div>

<script type="text/javascript">
$(document).ready(function(){
function remove(){
login.html('');
email.html('');
pass.html('');
pass_2.html('');
  }
$('button[name=click]').on('click', function(){
   return false;
}).on('click', function(){ 
var login = $(".login_error");
var email = $(".email_error");
var pass = $(".password_error");
var pass_2 = $(".password_error_2");
var form = $(".form-signin").serialize();
//отправка данных на сервер
$.post("App/controller/Register.php",form, function( data ){
  if(data.user == "ok"){
    var nike = $("[name=login]").val();
    alert("вы успешно зарегестрировали аккаунт под ником:"+' '+nike +' '+'теперь вам следует авторизоваться для входа в чат!');
    $("form").hide();
    remove();
    $("h1").replaceWith("<div class='link_auto'>Для того что бы авторизоваться перейдите по ссылке ----><a href='index.php'>Войти в чат</a></div>");
  }else{
login.html(data.login);
email.html(data.email);
pass.html(data.password);
pass_2.html(data.password_2);
}
},"json").done(function() {
$(".reg_loader").addClass("loader_add");
}).fail(function() {
//выводит ошибку если форма не отправлена
remove();
login.html("error! отправка не удалась");
}) .always(function() { 
 $(".reg_loader").removeClass("loader_add");
});
});
});
</script>
<?php  require_once('footer.php');?>