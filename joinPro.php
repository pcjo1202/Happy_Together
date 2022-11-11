<?php 
 header("Content-Type:text/html;charset=utf-8");
 $connection = mysql_connect('localhost','happy','together');
 mysql_select_db('happytogether',$connection);
 

 $id = $_POST['id'];
 $password = $_POST['password'];
 $name = $_POST['name'];
 $nickname = $_POST['nickname'];
 $gender = $_POST['gender'];
 $birth = $_POST['birth'];
 $phone = $_POST['phone'];
 $email = $_POST['email'];
echo "$id, $password, $name, $nickname, $gender, $birth, $phone";
 $query = "insert into member(id, password, name, nickname, gender, birth, phone, email)
            values('$id', '$password', '$name', '$nickname', '$gender', '$birth', '$phone', '$email')";
 $result = mysql_query($query, $connection);

 mysql_close($connection);
?>
<script>
    alert("회원가입에 성공하였습니다.!!!!!");
    location = "login.html";
</script>