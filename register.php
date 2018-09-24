<?php  require_once('header.php'); 
require_once('server/register_serv.php');
?>
<div class="p-3 mb-2 bg-secondary text-white">
<div class="text-center">
 <form class="form-signin" role="form" method="POST" action="register.php">
  <div class="alert alert-danger" role="alert">
          <?=$Error__1;?></div>
      <h1 class="h3 mb-3 font-weight-normal">Регистрация нового пользоателя</h1>
      <input type="text" name="login" class="form-control" placeholder="Введите логин" value="<?=$data['login'] ?? '';?>" required autofocus>
        

      <input type="text"  class="form-control" placeholder="Password" required>
    
      <button class="btn btn-lg btn-primary btn-block" type="submit">Регистрация</button>
    </form>
</div>
</div>



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