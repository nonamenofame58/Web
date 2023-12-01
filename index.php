
<?php
if (session_status() == PHP_SESSION_NONE) {
      session_start();

}
?>

<!DOCTYPE html>
<html>
<head>
  <meta content="text/html;charset=utf-8" http-equiv="Content-Type">
  <meta content="utf-8" http-equiv="encoding">
<link href="style.css" rel="stylesheet">
<script src="jquery.js"></script>
<script src="script.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<!-- NOTE:
#DFEFA5 0 green
#A1C327 1 green
#5A9F28 2 green
#0080B3 0 blue
#042634 1 blue
-->

<script type="text/javascript">

function exit(){
  location.reload();
  return false;

}

$(document).ready(function(){
    $.get("get.php",function(data){
      $('#story-line').append(data);
    });
});

</script>

<style media="screen">
  .share-header{ background-color:#042634;height: 30px;text-align:center;text-transform: uppercase;position: relative;top:-20px;color:#A1C327}
  .form-holder{background-color: #0080B3;margin-top:150px;}
  .form-holder{padding-bottom: 10px;width:30%;}
  .btn{text-transform: uppercase;width: 100%;background-color: #A1C327;margin-top: 20px;border:0.5px solid #5A9F28;overflow: hidden;color:black;font-weight: bold;}
  .btn:hover{background-color:#5A9F28;transition: 1s;color:black;font-weight: bold;}
  .story-line{background-color:white;}
  .stories {background-color:#0080B3;margin-top:20px;width: 80%;margin-left: 10%}
  .header-uploaded{margin-top: 10px;width:100%;border-bottom: 4px solid #FF8C00;text-align: center;color:#FF8C00 ;font-size:30px;text-transform:  uppercase;font-weight:bold;padding-top: 10px;}
  .register-class-ul li{list-style-type: none;margin:15px;}
  .register-class-ul{padding: 5px;}
  .header{height:75px;width: auto;background-color:#228B22;padding-top:5px;}
  .login-div{height:50px;float:right;}
  .legend-id h3{color:white;margin-top: 5px;}
  .legend-id{margin-bottom: 50px;}
  .exit-button{margin-top:-2px;}
  .legend-pp{position:relative;border-radius:10px;}
  .header li{float:left;list-style-type: none;margin-left: 10px;}
  .login-div input[type=text]{width:100px;}
  .login-div input[type=password]{width:100px;}
  .login-div input[type=submit]{width:100px;height:33px;background-color: #5A9F28;border:0px;border-radius: 3px;transition:0.5s;}
  .login-div input[type=submit]:hover{background-color:#5A9A42 ;transition:0.5s;color:white;}
  .kayıt-ol-modal{width:100px;height:33px;background-color:#191970;border-radius: 3px;color:#00BFFF;border:0px;transition: 0.5s;}
  .kayıt-ol-modal:hover{background-color:#00BFFF;transition: 0.5s;color:MidnightBlue;}
  .exit-login{height:20px;background-color:#DC143C;width:70px;margin-top:8px;border:0px solid #444;color:white;border-radius: 3px;transition: 1s;color:black;font-size: 15px;}
  .exit-login:hover{background-color:#DC200C;border-top-left-radius: 0px;transition: 1s;height: 25px;color:white;}
  .pp{width:60px;height:60px;border-radius: 20px;border:1px solid #555;padding: 1px;}
</style>
<body>




<div class="header">

  <div class="container">
    <!-- Trigger the modal with a button -->


    <!-- Modal -->
    <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Kayıt Formu</h4>
          </div>
          <div class="modal-body">

            <!-- NOTE: Register Form -->

            <div class="register-div">
              <form class="register-class" action="register.php" method="post">
                <ul class = register-class-ul>
                  <div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
  <input id="email" type="text" class="form-control" name="reg-id" placeholder="İsim">
</div>
<div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input id="password" type="password" class="form-control" name="reg-pw" placeholder="Şifre">
</div>
<div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
  <input id="password" type="password" class="form-control" name="password" placeholder="Şifre(Tekrar)">
</div>
<div class="input-group">
  <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
  <input id="password" type="email" class="form-control" name="email" placeholder="E-Posta">
</div>

<input type="submit" name="" value="aa">
<button type="submit" class="btn btn-default" data-dismiss="modal">Kayıt OL</button>
              </ul>
              </form>
            </div>

          </div>
          <div class="modal-footer">
            <button style = 'background-color:crimson;' type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
          </div>
        </div>

      </div>
    </div>

  </div>


  <?php
  if ($_SESSION['login'] == ''){
  echo ('<div class="login-div">');
  echo ('<form class="login-class" action="login.php" method="post">');
  echo ('<ul><li><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input id="email" type="text" class="form-control" name="id" placeholder="İsim"></div></li>');
  echo ('<li><div class="input-group"><span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span><input id="password" type="password" class="form-control" name="pw" placeholder="Şifre"></div></li>');
  echo ('<li><input type="submit" name="submit" value="Giriş"></li>');
  echo ('<li><button type="button" class="kayıt-ol-modal" data-toggle="modal" data-target="#myModal">Kayıt</button></li></ul>');
  echo ('</form>');
  echo ('</div>');
  }
  ?>
  <ul>
  <li> <?php
  if($_SESSION['login'] == 'ok'){
  echo('<div class="legend-pp"><img class = "pp" src = "upload/pp.jpeg"> </div>');
}


  ?></li>
<li>
  <div class="legend-id">

  <h3>
    <?php
    echo($_SESSION['id']);
    if($_SESSION['id'] == ''){
    }else{
    echo('<form class="" action="exit.php" method="post"><input class="exit-login" type="submit" name="" value="Çık"></form>');
    }
     ?>
   </h3>

  </div>
</li>
<li>
  <div class='exit-button'>
    <?php

    ?>
  </div>

</li>
</ul>
</div>




  <!-- NOTE: SHARE FORM START -->
<div class="form-holder">
  <div class="share-header">
    <h3 style="font-family: Impact; font-weight: bold;">Paylaşım</h3>
  </div>

  <form id='share-form' action="connecti.php" method="post" >
    <!-- NOTE: Başlık -->
   <div class="input-group">
     <span class="input-group-addon" style = 'background-color:green;color:white;'><i class="glyphicon glyphicon-fire"></i></span>
     <input id="header" type="text" class="form-control" name="header" placeholder="Başlık :">
   </div>

   <!-- NOTE: Adress -->
   <div class="input-group">
     <span class="input-group-addon"><i class="glyphicon glyphicon-map-marker"></i></span>
     <input id="adress" type="text" class="form-control" name="adress" placeholder="Adres :">
   </div>

<!-- NOTE: Telefon -->
   <div class="input-group">
     <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
     <input id="phone" type="text" class="form-control" name="tel" placeholder="Telefon :">
   </div>

<!-- NOTE: Fiyat -->
   <div class="input-group">
     <span class="input-group-addon"><i class="glyphicon glyphicon-tag"></i></span>
     <input id="fiyat" type="text" class="form-control" name="price" placeholder="Fiyat :">
   </div>

   <!-- NOTE: Yorum -->

   <div class="form-group" style = 'margin-top:10px;'>
    <label for="comment">Açıklama</label>
    <textarea id='comment' class="form-control" rows="2" id="comment" name = 'comment'></textarea>
  </div>
  <div type='file' id="dragandrophandler" >Fotoğraf / Video Yükle</div>

  <!-- NOTE: Button -->

<button  type="submit" class="btn btn-primary">Paylaş</button>

 </form>
</div>









<div id="story-line" class="story-line">
</div>


















  </body>
</html>
