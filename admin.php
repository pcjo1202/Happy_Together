<?php
header("Content-Type:text/html;charset=utf-8");
 $connection = mysql_connect('localhost', 'happy','hato');
 mysql_select_db('happytogether');
 
 $id = $_POST['id'];
 $password = $_POST['password'];
 $query = "select * from admin where id= '$id'";

 $result = mysql_query($query, $connection);
 $loginPro = mysql_fetch_array($result);

 if($loginPro[0]){
    if($loginPro[1] == $password){
        echo "<script>alert('로그인 성공'); location='admin.html';</script>";
    }
    else {
        echo "<script>alert('Password 오류'); history.back(); </script>";
    }
 }else {
    echo "<script>alert('ID 오류'); history.back();</script>";
 }


?>