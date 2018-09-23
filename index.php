<?php  require_once('header.php');  ?>

  <div class="p-3 mb-2 bg-secondary text-white">
   Если вы не зарегистрированны  перейдите по ссылке: <a href="register.php" class="reGistr">регистрация</a><br>
   Введите ваши данные для входа:<br>
   <a></a>
   <!-- form -->
   <form method="POST">
    <div class="form-row">
      <div class="form-group col-md-3">
        <label for="inputEmail4">Почта или логин:</label>
        <input type="emailorlogin" name="login" class="form-control loginUp" id="inputEmail4" placeholder="почта или логин">
        <div class="text"></div>
      </div>
      <div class="form-group col-md-3">
        <label for="inputPassword4">Пароль</label>
        <input type="password" name="password" class="form-control" id="inputPassword4" placeholder="**********">
        <div class="d-flex flex-row-reverse my-4">
          <button type="submit" name="ok"  class="btn btn-primary">Вход</button>
          <div class="btn btn-outline-danger col-md-offset-4 DeleteWrite">
            <a href="#">Удалить написанное</a>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>

<?php  require_once('footer.php');  ?>