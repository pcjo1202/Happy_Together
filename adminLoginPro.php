<?php
header("Content-Type:text/html;charset=utf-8");
$connection = mysqli_connect('52.78.0.158','remoteJO','remoteJO','happyTogether',56946);
 
 $id = $_POST['id'];
 $password = $_POST['password'];
 $query = "select * from admin where id= '$id'";

 $result = mysqli_query($connection, $query);
 $loginPro = mysqli_fetch_array($result);

 if($loginPro[0]){
    if($loginPro[1] == $password){
        echo "<script>alert('로그인 성공'); location='adminMain.php';</script>";
        session_start();
        $_SESSION['id'] = $id;
    }
    else {
        echo "<script>alert('Password 오류'); history.back(); </script>";
    }
 }else {
    echo "<script>alert('ID 오류'); history.back();</script>";
 }


?>