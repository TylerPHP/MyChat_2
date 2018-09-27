<?php  require_once('header.php'); 
require_once('server/register_serv.php');
?>

<div class="text-center p-4 border border-white bg-secondary">
  <h1 class="h4 mb-4 ">Регистрация</h1>
  <div class="text-danger"><?=$Error__1;?></div>
  <form class="form-signin" role="form" method="POST" action="register.php">
    <input type="text" name="login" class="form-control" placeholder="Введите логин" value="<?=$data['login'] ?? '';?>" required autofocus>
    <div class="text-danger"><?=$Error__2;?></div>
    <input type="text" name="email" class="form-control" placeholder="Введите почту" value="<?=$data['email'] ?? '';?>" required> 
    <div class="text-danger"><?=$Error__3;?></div>
    <input type="password" name="password" class="form-control" placeholder="Введите пароль" value="<?=$data['password'] ?? '';?>" required>
    <div class="text-danger"><?=$Error__4;?></div>
    <input type="password" name="password_2" class="form-control" placeholder="Подтвердите пароль" value="<?=$data['password_2'] ?? '';?>" required>
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

  // var email = document.querySelector('input[name=email]');
  // var login = document.querySelector('input[name=login]');
//-------------------------------login---------------
function formInput(input){
 input.select.onblur = function(){
var xhr = new XMLHttpRequest();
xhr.open("POST","server/register_serv.php",true);
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
xhr.onreadystatechange = function () {
if(xhr.readyState==4 && xhr.status==200){
  if(xhr.responseText == '1'){
    document.querySelector('.text-danger').innerHTML = "<strong>ошибка !</strong> логин или почта уже заняты";
  }else{
    document.querySelector('.text-danger').innerHTML = "";
  } 
}}
var vars = input.name+"_xhr="+input.select.value;
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







<!-- <div class="p-3 mb-2 bg-secondary text-white"> -->
  <!-- form -->
<!--   <div class="container">

    <form class="form-horizontal" role="form" method="POST" action="register.php">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <h2>Регистарция нового пользователя</h2>
          <hr>
        </div>
      </div>
      <div class="row">
        <div class="col-md-3 field-label-responsive">
          <label for="name">Логин</label>
        </div>
        <div class="col-md-6">
          <div class="form-group">
            <div class="input-group mb-2 mr-sm-2 mb-sm-0">
              <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-user"></i></div>
              <input type="text" name="login" class="form-control" id="name"
              placeholder="ваш_логин" required autofocus value="<?=$data['login'] ?? '';?>">
            </div>
          </div>
        </div>
          <div class="alert alert-danger" role="alert">
          <?=$Error__1;?></div>
        </div>

        <div class="row">
          <div class="col-md-3 field-label-responsive">
            <label for="email">Почта</label>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                <input type="text" name="email" class="form-control" id="email"
                placeholder="you@example.com" required autofocus value="<?=@$data['email'];?>">
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 field-label-responsive">
            <label for="password">Пароль</label>
          </div>
          <div class="col-md-6">
            <div class="form-group has-danger">
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                <input type="password" name="password" class="form-control" id="password"
                placeholder="пароль" required>
              </div>
            </div>
          </div>
          <?=@$EnterError[2];?>
        </div>

        <div class="row">
          <div class="col-md-3 field-label-responsive">
            <label for="password">Подтвердите пароль</label>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon" style="width: 2.6rem">
                  <i class="fa fa-repeat"></i>
                </div>
                <input type="password" name="password-confirmation" class="form-control"
                id="password-confirm" placeholder="пароль" required>
              </div>
            </div>
          </div>
          <?=@$EnterError[3];?>
        </div>
        <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
            <button type="submit" class="btn btn-success" name="click"><i class="fa fa-user-plus"></i>Регистрация</button>
          </div>
        </div>
      </form>
    </div>
  </div> -->

  <?php  require_once('footer.php');  ?>