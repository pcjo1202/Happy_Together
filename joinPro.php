<?php 
 header("Content-Type:text/html;charset=utf-8");
//  $connection = mysql_connect('13.209.79.194:58727','remoteJO','remoteJO');
//  mysql_select_db('happyTogether',$connection);
 $connection = mysqli_connect('13.209.79.194:58727','remoteJO','remoteJO');
 mysqli_select_db($connection,'happyTogether');
 

 $id = $_POST['id'];
 $password = $_POST['password'];
 $name = $_POST['name'];
 $nickname = $_POST['nickname'];
 $gender = $_POST['gender'];
 $birth = $_POST['birth'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
 
echo "$id, $password, $name, $nickname, $gender, $birth, $phone, $email";
 $query = "insert into member(id, password, name, nickname, gender, birth, phone, email)
            values('$id', '$password', '$name', '$nickname', '$gender', '$birth', '$phone', '$email')";
 $result = mysqli_query($connection,$query);

 mysqli_close($connection);
?>
<script>
    alert("회원가입에 성공하였습니다.!!!!!");
    location = "login.html";
</script>