<?php  require_once('header.php'); 
// require_once('server/register_serv.php');
?>

<div class="text-center p-4 border border-white bg-secondary">
  <h1 class="h4 mb-4 ">Регистрация</h1>
  <div class="text-danger login_error"><!-- <?=$Error__1;?> --></div>
  <form class="form-signin" role="form" method="POST" action="register.php">
    <input type="text" name="login" class="form-control " placeholder="Введите логин" value="<?=$data['login'] ?? '';?>" required autofocus>
    <div class="text-danger email_error"><!-- <?=$Error__2;?> --></div>
    <input type="text" name="email" class="form-control " placeholder="Введите почту" value="<?=$data['email'] ?? '';?>" required> 
    <div class="text-danger"><!-- <?=$Error__3;?> --></div>
    <input type="password" name="password" class="form-control password_xhr" placeholder="Введите пароль" value="<?=$data['password'] ?? '';?>" required>
    <div class="text-danger"><!-- <?=$Error__4;?> --></div>
    <input type="password" name="password_2" class="form-control password_xhr_2" placeholder="Подтвердите пароль" value="<?=$data['password_2'] ?? '';?>" required>
    <button class="btn btn-lg btn-primary btn-block" name="click" type="submit">Регистрация</button>
  </form>
</div>
<script>
  //введенные значения из input
  var email = new Object();
  email.select = document.querySelector('input[name=email]');
  email.name = 'email';

  var login = new Object();
  login.select = document.querySelector('input[name=login]');
  login.name = 'login';
//-------------------------------login---------------
function formInput(input){
 input.select.oninput = function(){
  var xhr = new XMLHttpRequest();
  xhr.open("POST","server/register_serv.php",true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function () {
    if(xhr.readyState==4 && xhr.status==200){
     
        if(input.name == 'login'){ 
          var pul = '.login_error';
      }
       if(input.name == 'email'){ 
          var pul = '.email_error';  
      }
      if(xhr.responseText){
        document.querySelector(pul).innerHTML = xhr.responseText;
      }else{
       document.querySelector(pul).innerHTML = "";
     } 
   }}
   var vars = input.name+"="+input.select.value;
   xhr.send(vars);
 }}
 formInput(login);
 formInput(email);

//   login.onblur = function(){
//     var xhr = new XMLHttpRequest();
//   xhr.open("POST","server/register_serv.php",true);
//   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//   xhr.onreadystatechange = function () {
// if(xhr.readyState==4 && xhr.status==200){
//   if(xhr.responseText == '1'){
//     document.querySelector('.text-danger').innerHTML = "<strong>ошибка !</strong> логин или почта уже заняты";
//   }
//  }
// }
// var vars = "login_xhr="+login.value;
// xhr.send(vars);
//   }
// //----------------------------------------------
// //---------------------------email-------------------
//  email.onblur = function(){
//   var xhr = new XMLHttpRequest();
//   xhr.open("POST","server/register_serv.php",true);
//   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
//   xhr.onreadystatechange = function () {
// if(xhr.readyState==4 && xhr.status==200){
//   var return_data = xhr.responseText;

//  }
// }
// var vars = "email_xhr="+email.value;
// xhr.send(vars);
// }

</script>
<?php  require_once('footer.php');  ?>