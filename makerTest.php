<?php

  // function getMainCategory(){ //main category 반환
    
  //   return $data;
  // }
  
  $dbname = 'happyTogether';

  $connect = mysqli_connect('52.78.0.158:56946','remoteJO','remoteJO');
  mysqli_select_db($connect, $dbname);

  if(!$connect){
    die("서버와의 연결 실패! : ". mysqli_connect_error());
  }
  
  echo "서버와 연결 성공! 뿌잉";

  $main = getMainCategory();

  mysqli_close($connect);
?>