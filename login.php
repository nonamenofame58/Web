<?php
session_start();
include 'coonect.php';

if ($conn){
  $logid = $_POST['id'];
  $logpw = $_POST['pw'];
  $sqllogid = "SELECT * FROM user WHERE id = '".$logid."'";
  $sqllogpw = "SELECT * FROM user WHERE pass = '".$logpw."'";
  $resultid = $conn->query($sqllogid);
  $resultpw = $conn->query($sqllogpw);
  if($resultid->fetch_all()){
    if($resultpw->fetch_all()){
      echo('login ok');
      $_SESSION['id'] = $logid;
      $_SESSION['pw'] = $logpw;
      $_SESSION['login'] = 'ok';
      header("Location: index.php");

    }else{
      echo('isim veya şifre yanlış');
    }
  }else{
    echo('isim veya şifre yanlış');
  }





}





 ?>
