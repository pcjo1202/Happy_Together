<!-- 
  > mysql --host=13.209.79.194 --port=58727 -u remoteJO -p 
  //명령어 입력하고, password 'remoteJO' 입력하면 접속 가능

  아래 코드처럼 연결하면 구름ide mysql서버에 연결가능!
-->

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
