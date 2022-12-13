<?php include("./connect.php")?>

<?php
 header("Content-Type:text/html;charset=utf-8");  

  $id = $_POST['id'];
  $password = $_POST['password'];
  $query = "select id, password, name from member where id='$id'";
  $result = mysqli_query($connection, $query);
  $loginPro = mysqli_fetch_array($result); 

  if($loginPro[0]) {
    if("$password" == "$loginPro[1]"){
      echo "<script> 
        alert('로그인 성공'); 
        location.href='index.php';
      </script>";
      session_start();
      $_SESSION['id'] = $id;
      $_SESSION['name'] = $loginPro[2];
    }
    else {
      echo "<script>alert('비밀번호가 다릅니다.'); history.back();</script>";
    }
  }else {
    echo "<script>alert('아이디가 다릅니다.'); history.back();</script>";
  }
  ?>