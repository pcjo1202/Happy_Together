<?php
  $dbname = 'happyTogether';

  $connect = mysqli_connect('13.209.79.194:58727','remoteJO','remoteJO');

  mysqli_select_db($connect, $dbname);

  if(!$connect){
    die("서버와의 연결 실패! : ". mysqli_connect_error());
  }
  
  echo "서버와 연결 성공!";

  mysqli_close($connect);
?>
