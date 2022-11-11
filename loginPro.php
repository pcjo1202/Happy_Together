<?php
  $connection = mysql_connect('localhost','happy','together');
  mysql_select_db('happytogether',$connection);
  

  $id = $_POST['id'];
  $password = $_POST['password'];
  $query = "select id, password from member where id='$id'";
  $result = mysql_query($query, $connection);
  $loginPro = mysql_fetch_array($result); 

  if($loginPro[0]) {
    if("$password" == "$loginPro[1]"){
      echo '로그인 성공';
    }
    else {
      echo '비밀번호가 다름';
    }
  }else {
    echo '아이디가 다름';
  }
  ?>