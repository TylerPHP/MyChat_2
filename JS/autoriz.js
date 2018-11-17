$(document).ready(function(){
function remove(){
$(".input_error").text('');
$(".password_error").text('');
  }
$('button[name=click]').on('click', function(){
   return false;
}).on('click', function(){ 
var input = $(".input_error");
var pass = $(".password_error");
var form = $(".form-signin").serialize();
//отправка данных на сервер
$.post("App/controller/Auhthorization.php",form, function( data ){
  if(data.user == "ok"){
alert(data);
  }
  }else{
input.html(data.input);
pass.html(data.password);
}
},"json").done(function() {
$(".reg_loader").addClass("loader_add");
}).fail(function() {
//выводит ошибку если форма не отправлена
remove();
input.html("<strong>error! </strong> отправка не удалась");
}) .always(function() { 
 $(".reg_loader").removeClass("loader_add");
});
});
});