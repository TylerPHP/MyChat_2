$(document).ready(function(){
function remove(){
$(".login_error").text('');
$(".email_error").text('');
$(".password_error").text('');
$(".password_error_2").text('');
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
$("h1").replaceWith("<div class='link_auto'>Вы успешно зарегестрировали аккаунт под ником:"+' '+nike +"<br>Для того что бы авторизоваться перейдите по ссылке ----><a href='index.php'>Войти в чат</a></div>");
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
login.html("<strong>error! </strong> отправка не удалась");
}) .always(function() { 
 $(".reg_loader").removeClass("loader_add");
});
});
});