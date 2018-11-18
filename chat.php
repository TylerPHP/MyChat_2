 <!-- прошлая версия -->
 <?php 
include_once'server/log.php';
include 'server/Chat.php';
?>
<!doctype html>
<html lang="en-ru">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
  <link rel="stylesheet" href="CSS/style.css">
  <script src="JS/jquery-3.3.1.js"></script>
  <script src="JS/content.js"></script>
  <noscript><span>------Enable javascript for future work!!!!!-------</span></noscript>
</head>
<body>
  <script>
    $(document).ready (function (){

      $(".radio-inline").hide();

      if('<?=$genderNow?>' == 'Woman')
      {
        $(".genDer").append('Woman');
      }
      if('<?=$genderNow?>' == 'Man')
      {
        $(".genDer").append('Man');
      }

    });
  </script>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top chatNav">
   <div class="col-md-12 col-md-4">
    <a href="index.php" class="col">Authorization</a>
    <a href="AboutChat.php" class="col">About Chat</a>
    <a href="#" class="col mySettings">My settings</a>
    <a href="?exitOne" class="btn btn-outline-danger col-md-offset-4 exitOne">Exit</a>
  </div>
</nav>
<!-- chenge settings -->
<div class="p-3 mb-2 bg-secondary text-black heightMess">
 <fieldset class="settings">
  <legend></legend>
  <figure class="figure">
    <img src="<?=$endArr?>"   class="figure-img img-fluid rounded" alt="A generic square ....">
    <figcaption class="figure-caption text-black">---max size 300x300--</figcaption>
    <?=$err?>
    <a href="#" class="ChangePicture">Select picture</a>
    <a href="#" class="DonloadPicture">Сhange</a>
  </figure>
  <form action="Chat.php" enctype="multipart/form-data" method="POST">
    <div class="form-group file-upload">
      <div class="col-sm-8">
        <input type='hidden' name='sessid' value='<?=$_SESSION['sessid']?>'>
        <input type="file" name="file" id="file">
        <input type="submit" name="upload" value="Send File" id="upload">
      </div>
    </div>
  </form>
  <form method="POST" action="Chat.php" enctype="multipart/form-data" >
    <div class="form-group">
      <label for="inputsm">Name or nickname for chat</label>
      <input class="form-control input-sm" name="nikname" id="inputsm" type="text" value="<?=$niknameNow?>">
    </div>
    <label class="radio-inline"><input type="radio" name="man" value="1">Man</label>
    <label class="radio-inline"><input type="radio" name="man" value="2">Woman</label>
    <div class="genDer"></div>
    <div class="form-group row">
      <label for="example-number-input" class="col-2 col-form-label">Age</label>
      <div class="col-4">
        <input type='hidden' name='hidden' value='<?=$userNow?>'>
        <input class="form-control" type="number" name="age" id="example-number-input" value="<?=$ageNow?>">
      </div>
      <button type="submit" name="Save" class="btn btn-primary">Save changes</button>
    </form>
    <div class="SaveData"></div>
  </fieldset>
  <div id='info'>
  <?php
   require("server/masseges.php");//messeges of base
   ?>
 </div>
</div>


<div class="col-md-12 coloRewin fixed-bottom">
	<footer id="footer" class="footer"><!--Footer-->
    <div class="footer-bottom">
      <!-- form -->
      <form method="POST" enctype="multipart/form-data" >
       <div class="form-group ">
       <div class="clickMasseges"><label for="comment">Your massge:</label>
        <textarea class="form-control massegeWrite" rows="5" id="comment"></textarea>
        <button type="submit" class="btn btn-primary noneclick">Submit</button>
      </div>
      </div>
    </div>
  </form>
</footer><!--/Footer-->
</div>

<!-- Optional JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
</body>
</html>
<? exit() ?>