<?php  require_once('header.php');  ?>

<div class="p-3 mb-2 bg-secondary text-white">
 Если логина и пароля у Вас нет, пройдите несложную процедуру: <a href="register.php" class="reGistr">регистрация</a><br>
 Введите ваши данные для входа:<br>
 <a></a>
 <!-- form -->
 <div class="text-danger input_error"></div>
 <form class="form-signin" role="form" method="POST" action="App/controller/autariz.php">
  <input type="text" name="login" class="form-control" placeholder="Введите логин или почту" value="<?=$_POST['login'] ?? '';?>" required autofocus">
  <input type="password" name="password" class="form-control" placeholder="Введите пароль" value="<?=$_POST['password'] ?? '';?>" required><div class="captcha">
    <div style="display: none;">
  <b>Проверчный код:</b><br>
      <img src = 'App/model/captcha/captcha.php'><br>
   <input type = 'text' name = 'kapcha' class="form-control" placeholder="Введите проверочный текст" required></div><br></div>
  <button class="btn btn-lg btn-primary btn-block" name="reg" type="submit">Вход в чат</button>
  <div class="btn btn-outline-danger col-md-offset-4 DeleteWrite">
    <a href="#">Удалить написанное</a>
  </div>
  <input type="checkbox" value="remember-me">Запомнить меня 
</form>
</div>

<script src="JS/autariz.js" type="text/javascript"></script>
<?php  require_once('footer.php');  ?>