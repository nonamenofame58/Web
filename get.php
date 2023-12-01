<?php
include 'coonect.php';

if ($conn){

  $get = 'SELECT * FROM share';
  $results = $conn->query($get);
  $row = $results->fetch_assoc();
  $cont = $results->num_rows;

  if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()){

  $header_row = $row['head'];
  $adres_row = $row['addres'];
  $tel_row = $row['tel'];
  $price_row = $row['price'];
  $comm_row = $row['comm'];
  $time_row = $row['time'];
  $date_row = $row['date'];
  $photo_row =$row['uploadir'];
#  echo ('<br>'.$header_row.'<br> '.$adres_row.'<br>'.$header_row.'<br>'.$tel_row.'<br>'.$price_row.'<br>'.$comm_row.'<br>'.$time_row.'<br>'.$date_row);


    echo ('<div class="stories">');
    echo ('<div class="header-uploaded">'.$header_row.'</div>');
    echo ('<h2 id = >'.$adres_row.'</h1>');
    echo ('<h2 id = >'.$tel_row.'</h1>');
    echo ('<h2 id = >'.$price_row.'</h1>');
    echo ('<h2 id = >'.$comm_row.'</h1>');
    $dir = 'upload/'.$photo_row;

    $file = scandir($dir);
    $a = count($files);
    foreach ($file as &$files) {

      if($dir == 'upload/'){

      }else{
          if ($files != '.' && $files != '..' )
          echo ('<img class="shared-img" src = '.$dir.'/'.$files.'>');
        }
    }
    echo ('</div>');


 }
}

}else{
  echo ($err);
}





 ?>
