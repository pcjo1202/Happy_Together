<?php

  // function getMainCategory(){ //main category 반환
    
  //   return $main
  // }

  // function getSubCategory(){
  //   return $sub
  // }


  header("Content-Type:text/html;charset=utf-8");
  
  $dbname = 'happyTogther';
  $serverName = '52.78.0.158:56946';
  $user = 'remoteJO';
  $password = 'remoteJO';

  $connect = mysqli_connect($serverName, $user, $password, $dbname);

  $title = $_POST['title'];
  $mainCategory = $_POST['mainCategory'];
  $subCategory = $_POST['subCategory'];
  $memberCount = $_POST['memberCount'];
  $place = $_POST['place'];
  $date = $_POST['date'];
  $contents = $_POST['contents'];

  echo "$title, $date, $mainCategory, $subCategory, $memberCount, $place, $date, $contents";

  $query = "insert into 000 values('$title','$date', '$mainCategory', '$subCategory', '$memberCount', '$place', '$contents')";

  // $result = mysqli_query($connect, $query);

  // if(!$result){
  //   die("서버와 연결 실패" . mysqli_connect_error());
  // }
  // echo " 서버 연결 성공!";

  mysqli_close($connect);
?>