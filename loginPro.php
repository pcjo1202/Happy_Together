<?php
 header("Content-Type:text/html;charset=utf-8");
  $connection = mysql_connect('localhost','happy','together');
  mysql_select_db('happytogether',$connection);
  

  $id = $_POST['id'];
  $password = $_POST['password'];
  $query = "select id, password from member where id='$id'";
  $result = mysql_query($query, $connection);
  $loginPro = mysql_fetch_array($result); 

  if($loginPro[0]) {
    if("$password" == "$loginPro[1]"){
      echo "<script> 
        alert('로그인 성공'); 
        location.href='index.php';
      </script>";
      session_start();
      $_SESSION['id'] = $id;
    }
    else {
      echo "<script>alert('비밀번호가 다릅니다.'); history.back();</script>";
    }
  }else {
    echo "<script>alert('아이디가 다릅니다.'); history.back();</script>";
  }
  ?>